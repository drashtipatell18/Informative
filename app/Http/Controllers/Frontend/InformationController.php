<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Models\Country;


class InformationController extends Controller
{
    public function Information($id)
    {
        $country = Country::findOrFail($id);
        $informations = Information::all();
        return view('frontend.Information',compact('country','informations'));
    }
}
