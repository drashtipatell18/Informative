<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutTravesly;

class AboutTraveslyController extends Controller
{
    public function Travesly()
    {
        $abouttravesly = AboutTravesly::all();
        return view('AboutTravesly.view_abouttravesly', compact('abouttravesly'));
    }

    public function TraveslyCreate()
    {
        return view('AboutTravesly.create_abouttravesly');
    }

    public function TraveslyStore(Request $request)
    {
        $image_names = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/AboutTravesly'), $name);
                $image_names[] = $name;
            }
        }

        AboutTravesly::insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => json_encode($image_names), // store as JSON
        ]);

        return redirect()->route('travesly')->with('success','About Travesly created successfully');
    }


    public function TraveslyEdit($id)
    {
        $aboutTravel = AboutTravesly::find($id);
        return view('AboutTravesly.create_abouttravesly', compact('aboutTravel'));
    }

   public function TraveslyUpdate(Request $request, $id)
    {
        // dd($request->all()); // Remove this after testing

        $abouttravesly = AboutTravesly::findOrFail($id);

        // Start with old images from request (these are the ones user wants to keep)
        $image_names = [];

        // Handle old images that should be retained
        if ($request->has('old_image') && $request->old_image) {
            $old_images = json_decode($request->old_image, true);
            if (is_array($old_images)) {
                $image_names = $old_images;
            }
        }

        // Handle deleted images
        if ($request->has('deleted_images') && $request->deleted_images) {
            $deleted_images = json_decode($request->deleted_images, true);
            if (is_array($deleted_images)) {
                // Remove deleted images from the image_names array
                $image_names = array_diff($image_names, $deleted_images);

                // Delete physical files
                foreach ($deleted_images as $deleted_image) {
                    $image_path = public_path('images/AboutTravesly/' . $deleted_image);
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
            }
        }

        // Handle new image uploads
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/AboutTravesly'), $name);
                $image_names[] = $name;
            }
        }

        // Re-index array to avoid gaps in keys
        $image_names = array_values($image_names);

        // Update the record
        $abouttravesly->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => json_encode($image_names), // Note: changed from 'image' to 'images' based on your findOrFail query
        ]);

        return redirect()->route('travesly')->with('success', 'About Travesly updated successfully');
    }

    public function TraveslyDestroy($id)
    {
        $abouttravesly = AboutTravesly::find($id);
        $abouttravesly->delete();
        return redirect()->route('travesly')->with('success','About Travesly deleted successfully');
    }

   public function destroyImage(Request $request)
    {
        try {
            $imageName = $request->input('image_name');
            $aboutTravelId = $request->input('about_travel_id');

            // Validate inputs
            if (!$imageName || !$aboutTravelId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Missing required parameters'
                ], 400);
            }

            // Find the about travel record
            $aboutTravel = AboutTravesly::find($aboutTravelId);

            if (!$aboutTravel) {
                return response()->json([
                    'success' => false,
                    'message' => 'About Travel record not found'
                ], 404);
            }

            // Debug: Log current state
            \Log::info('Before deletion', [
                'current_image_field' => $aboutTravel->image,
                'image_to_delete' => $imageName
            ]);

            // Get current images from database
            $currentImages = [];

            if ($aboutTravel->image) {
                // Decode JSON array
                $decodedImages = json_decode($aboutTravel->image, true);

                if (json_last_error() === JSON_ERROR_NONE && is_array($decodedImages)) {
                    $currentImages = array_filter($decodedImages); // Remove empty values
                }
            }

            // Check if the image exists in the database
            if (!in_array($imageName, $currentImages)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Image not found in database record'
                ], 404);
            }

            // Remove the specified image from the array
            $updatedImages = array_filter($currentImages, function($img) use ($imageName) {
                return trim($img) !== trim($imageName);
            });

            // Re-index the array to avoid gaps
            $updatedImages = array_values($updatedImages);

            // Update the database
            $aboutTravel->image = !empty($updatedImages) ? json_encode($updatedImages) : null;

            if (!$aboutTravel->save()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update database'
                ], 500);
            }

            // Debug: Log after database update
            \Log::info('After database update', [
                'updated_image_field' => $aboutTravel->image,
                'remaining_images' => $updatedImages
            ]);

            // Delete the physical file
            $imagePath = public_path('images/AboutTravesly/' . $imageName);
            $fileDeleted = false;

            if (file_exists($imagePath)) {
                $fileDeleted = unlink($imagePath);
                \Log::info('File deletion', [
                    'path' => $imagePath,
                    'deleted' => $fileDeleted
                ]);
            } else {
                \Log::warning('File not found for deletion', ['path' => $imagePath]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Image deleted successfully from database' . ($fileDeleted ? ' and file system' : ' (file not found)'),
                'remaining_images' => $updatedImages
            ]);

        } catch (\Exception $e) {
            // Log the complete error
            \Log::error('Error deleting image', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'image_name' => $request->input('image_name'),
                'about_travel_id' => $request->input('about_travel_id')
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error deleting image: ' . $e->getMessage()
            ], 500);
        }
    }
}
