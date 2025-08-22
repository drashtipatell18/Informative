<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUSController extends Controller
{
    public function AboutUS()
    {
        $aboutUs = AboutUs::all();
        return view('frontend.About_Us',compact('aboutUs'));
    }
}
