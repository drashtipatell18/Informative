<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class InternationalController extends Controller
{
    public function International()
    {
        $countries = Country::where('is_domestic', 0)->get();
        return view('frontend.international',compact('countries'));
    }
}
