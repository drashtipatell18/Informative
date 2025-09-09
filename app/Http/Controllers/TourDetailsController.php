<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Information;
use App\Models\TourDetails;
use Illuminate\Http\Request;

class TourDetailsController extends Controller
{
    public function TourDetails()
    {
        $tour_details = TourDetails::all();
        return view('tour_informative.tourInfo_view',compact('tour_details'));
    }

    public function TourDetailsCreate()
    {
        $informations = Information::all();
        $countries = Country::all();

        $mediaInformationIds = $informations->filter(function($info) {
            return strtolower($info->type) === 'media';
        })->pluck('id')->toArray();

        return view('tour_informative.tourInfo_create',compact('informations','countries','mediaInformationIds'));
    }

    public function TourDetailsStore(Request $request)
    {
            TourDetails::insert([
                'country_id' => $request->input('country_id'),
                'information_id' => $request->input('information_id'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        return redirect()->route('tour_details')->with('success', 'Tour Details created successfully');
    }




    public function TourDetailsEdit($id)
    {
        $informations = Information::all();
        $countries = Country::all();
        $tour_details = TourDetails::find($id);
        $mediaInformationIds = $informations->filter(function($info) {
            return strtolower($info->type) === 'media';
        })->pluck('id')->toArray();
        return view('tour_informative.tourInfo_create',compact('tour_details','informations','countries','mediaInformationIds'));
    }

    public function TourDetailsUpdate(Request $request, $id)
    {
        $tour_details = TourDetails::findOrFail($id);

        // Handle images if uploaded
        if ($request->hasFile('images')) {
            $imagePaths = [];

            $destinationPath = public_path('tour_images');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
                $image->move($destinationPath, $filename);
                $imagePaths[] = $filename;
            }

            // Option 1: Replace old images with new ones
            // Delete old images if exist
            if (!empty($tour_details->image_path)) {
                $oldImages = explode(',', $tour_details->image_path);
                foreach ($oldImages as $oldImage) {
                    $oldImagePath = public_path('tour_images/' . $oldImage);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            $imagePathString = implode(',', $imagePaths);

            $tour_details->update([
                'country_id' => $request->input('country_id'),
                'information_id' => $request->input('information_id'),
                'title' => $request->input('title'),
                'description' => null,  // Clear description if images present
                'image_path' => $imagePathString,
            ]);
        } else {
            // No new images uploaded, just update text fields
            $tour_details->update([
                'country_id' => $request->input('country_id'),
                'information_id' => $request->input('information_id'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                // Keep existing images untouched
            ]);
        }

        return redirect()->route('tour_details')->with('success', 'Tour Details updated successfully');
    }


    public function TourDetailsDestroy($id)
    {
        $tour_details = TourDetails::find($id);
        $tour_details->delete();
        return redirect()->route('tour_details')->with('success','Tour Details deleted successfully');
    }
}
