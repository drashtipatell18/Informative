<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class DomesticController extends Controller
{
    public function Domestic()
    {
        $countries = Country::whereHas('category', function ($query) {
            $query->where('name', 'Domestic');
        })->get();
        return view('frontend.Domestic',compact('countries'));
    }
}
