<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class InternationalController extends Controller
{
    public function International()
    {
        $countries = Country::whereHas('category', function ($query) {
            $query->where('name', 'International');
        })->get();
        return view('frontend.international',compact('countries'));
    }
}
