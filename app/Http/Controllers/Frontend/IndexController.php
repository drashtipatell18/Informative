<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Silder;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Silder::all();
        return view('frontend.index',compact('sliders'));
    }

    public function CreateFrontEnquiry(Request $request)
    {
        Enquiry::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'travel_date' => $request->input('travel_date'),
            'city' => $request->input('city'),
            'total_passenger' => $request->input('total_passenger'),
            'select_your_interest' => implode(',', $request->input('select_your_interest', [])),
            'message' => $request->input('message'),
        ]);

        if ($request->ajax()) {
            return response()->json(['message' => 'Enquiry created successfully!']);
        }

        return redirect()->route('index')->with('success', 'Enquiry created successfully!');
    }
}
