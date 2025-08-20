<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class DomesticController extends Controller
{
    public function Domestic()
    {
        $countries = Country::where('category_id', 1)->get();
        return view('frontend.Domestic',compact('countries'));
    }
}
