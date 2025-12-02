<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TourDetails;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Information;


class InformationController extends Controller
{
    public function Information($id)
    {
        $country = Country::findOrFail($id);
        $tour_details = TourDetails::where('country_id',$id)->get();
         $informations = Information::all();

        return view('frontend.information',compact('country','tour_details','informations'));
    }
}
