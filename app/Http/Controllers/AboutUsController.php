<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
     public function aboutusBackend()
    {
        $aboutus = AboutUs::all();
        $aboutUsSecond = AboutUs::all()->skip(1)->take(1);
        return view('AboutUs.view_about', compact('aboutus','aboutUsSecond'));
    }

    public function aboutusCreate()
    {
        return view('AboutUs.create_about');
    }

    public function aboutusStore(Request $request)
    {
        $image_names = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/AboutUs'), $name);
                $image_names[] = $name;
            }
        }

        AboutUs::insert([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'images' => json_encode($image_names), // store as JSON
        ]);

        return redirect()->route('aboutus')->with('success','About US created successfully');
    }


    public function aboutusEdit($id)
    {
        $aboutus = AboutUs::find($id);
        return view('AboutUs.create_about', compact('aboutus'));
    }

    public function destroyImage(Request $request)
    {
        try {
            $imageName = $request->input('image_name');
            $aboutUsId = $request->input('about_us_id');

            $aboutUs = AboutUs::findOrFail($aboutUsId);

            // Decode image JSON from DB
            $currentImages = json_decode($aboutUs->images, true);

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
                $aboutUs->update([
                    'images' => json_encode($updatedImages)
                ]);
            }

            // Delete file from disk
            $imagePath = public_path('images/AboutUs/' . $imageName);
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
    public function aboutusUpdate(Request $request, $id)
    {
        $aboutus = AboutUs::findOrFail($id);

        // Get current images from database (most up-to-date)
        $currentDbImages = json_decode($aboutus->images, true);
        if (!is_array($currentDbImages)) {
            $currentDbImages = [];
        }

        // Start with current database images
        $image_names = $currentDbImages;

        // Handle new image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/AboutUs'), $name);
                $image_names[] = $name;
            }
        }

        // Re-index array to avoid gaps in keys
        $image_names = array_values($image_names);

        // Update the record
        $aboutus->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'images' => json_encode($image_names),
        ]);

        return redirect()->route('aboutus')->with('success', 'About Us updated successfully');
    }

    public function aboutusDestroy($id)
    {
        $aboutus = AboutUs::find($id);
        $aboutus->delete();
        return redirect()->route('aboutus')->with('success','About Us deleted successfully');
    }
}
