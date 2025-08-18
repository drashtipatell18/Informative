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
        return view('tour_informative.tourInfo_create',compact('informations','countries'));
    }

    public function TourDetailsStore(Request $request)
    {
        TourDetails::insert([
            'country_id' => $request->input('country_id'),
            'information_id' => $request->input('information_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description') 
        ]);
        return redirect()->route('tour_details')->with('success','Tour Details created successfully');
    }

    public function TourDetailsEdit($id)
    {
        $informations = Information::all();
        $countries = Country::all();
        $tour_details = TourDetails::find($id);
        return view('tour_informative.tourInfo_create',compact('tour_details','informations','countries'));
    }

    public function TourDetailsUpdate(Request $request, $id)
    {
        $tour_details = TourDetails::find($id);
        $tour_details->update([
            'country_id' => $request->input('country_id'),
            'information_id' => $request->input('information_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description') 
        ]);

        return redirect()->route('tour_details')->with('success','Tour Details updated successfully');
    }

    public function TourDetailsDestroy($id)
    {
        $tour_details = TourDetails::find($id);
        $tour_details->delete();
        return redirect()->route('tour_details')->with('success','Tour Details deleted successfully');
    }
}
