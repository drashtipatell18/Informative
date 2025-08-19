<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUSController extends Controller
{
    public function AboutUS()
    {
        return view('frontend.About_Us');
    }
}
