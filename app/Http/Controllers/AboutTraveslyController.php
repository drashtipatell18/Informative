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

    public function destroyImage(Request $request)
    {
        try {
            $imageName = $request->input('image_name');
            $aboutTravelId = $request->input('about_travel_id');

            $aboutTravel = AboutTravesly::findOrFail($aboutTravelId);

            // Decode image JSON from DB
            $currentImages = json_decode($aboutTravel->image, true);

            // Make sure it's an array
            if (!is_array($currentImages)) {
                $currentImages = [];
            }

            // Filter out the image to delete
            $updatedImages = array_filter($currentImages, function ($img) use ($imageName) {
                return trim($img) !== trim($imageName);
            });

            // Reindex the array to keep it clean
            $updatedImages = array_values($updatedImages);

            // Update DB only if image was actually removed
            if (count($currentImages) !== count($updatedImages)) {
                $aboutTravel->update([
                    'image' => json_encode($updatedImages)
                ]);
            }

            // Delete file from disk
            $imagePath = public_path('images/AboutTravesly/' . $imageName);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            return response()->json([
                'success' => true,
                'message' => 'Image deleted successfully',
                'updated_images' => $updatedImages // Send updated images back
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting image: ' . $e->getMessage()
            ], 500);
        }
    }

    // Fixed TraveslyUpdate method
    public function TraveslyUpdate(Request $request, $id)
    {
        $abouttravesly = AboutTravesly::findOrFail($id);

        // Get current images from database (most up-to-date)
        $currentDbImages = json_decode($abouttravesly->image, true);
        if (!is_array($currentDbImages)) {
            $currentDbImages = [];
        }

        // Start with current database images
        $image_names = $currentDbImages;

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
            'image' => json_encode($image_names),
        ]);

        return redirect()->route('travesly')->with('success', 'About Travesly updated successfully');
    }

    public function TraveslyDestroy($id)
    {
        $abouttravesly = AboutTravesly::find($id);
        $abouttravesly->delete();
        return redirect()->route('travesly')->with('success','About Travesly deleted successfully');
    }


}
