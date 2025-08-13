<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    /**
     * Display a listing of enquiries.
     */
    public function Enquiry()
    {
        $enquirys = Enquiry::all();
        return view('enquiry.view_enquiry', compact('enquirys'));
    }

    /**
     * Show the form for creating a new enquiry.
     */
    public function EnquiryCreate()
    {
        return view('enquiry.create_enquiry');
    }

    /**
     * Store a newly created enquiry in storage.
     */
    public function EnquiryStore(Request $request)
    {
        Enquiry::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'travel_date' => $request->input('travel_date'),
            'city' => $request->input('city'),
            'total_passenger' => $request->input('total_passenger'),
            'select_your_interest' => $request->input('select_your_interest'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('enquiry')->with('success', 'Enquiry created successfully!');
    }

    /**
     * Show the form for editing the specified enquiry.
     */
    public function EnquiryEdit($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        return view('enquiry.create_enquiry', compact('enquiry'));
    }

    /**
     * Update the specified enquiry in storage.
     */
    public function EnquiryUpdate(Request $request, $id)
    {

        $enquiry = Enquiry::findOrFail($id);
        $enquiry->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'travel_date' => $request->input('travel_date'),
            'city' => $request->input('city'),
            'total_passenger' => $request->input('total_passenger'),
            'select_your_interest' => $request->input('select_your_interest'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('enquiry')->with('success', 'Enquiry updated successfully!');
    }

    /**
     * Remove the specified enquiry from storage.
     */
    public function EnquiryDestroy($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();

        return redirect()->route('enquiry')->with('success', 'Enquiry deleted successfully!');
    }
}
