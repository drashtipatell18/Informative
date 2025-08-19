<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InternationalController extends Controller
{
    public function International()
    {
        return view('frontend.international');
    }
}
