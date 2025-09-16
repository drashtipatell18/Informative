<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Silder;
use App\Models\AboutTravesly;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Country;
use App\Models\VideoSlider;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterMail;
use App\Models\Newsletter;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Models\TourDetails;
class IndexController extends Controller
{
    public function index()
    {
        $sliders = Silder::all();
        $AboutTravesly = AboutTravesly::all();
        $Service = Service::all();
        $testimonials = Testimonial::all();
        $countries = Country::all();
        $videoslider = VideoSlider::all();

        foreach ($AboutTravesly as $item) {
            $item->images = json_decode($item->image); // decode the image JSON array into PHP array
        }
        return view('frontend.index',compact('sliders','AboutTravesly','Service','testimonials','countries','videoslider'));
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

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        Newsletter::create([
            'email' => $request->email
        ]);
        // Send confirmation email
        Mail::to($request->email)->send(new NewsletterMail());

        return back()->with('success', 'Subscription successful! Please check your email.');
    }

  
    public function downloadPDF($id)
    {
        $country = Country::findOrFail($id);
        $images = is_array($country->images) ? $country->images : json_decode($country->images, true);

        $tourDetails = TourDetails::where('country_id', $id)->where('information_id', 1)->get();
        $packageDetails = TourDetails::where('country_id', $id)->where('information_id', 2)->get();
        $visaDetails = TourDetails::where('country_id', $id)->where('information_id', 3)->get();

        $pdf = Pdf::loadView('frontend.pdfdownload', compact(
            'country', 'images', 'tourDetails', 'packageDetails', 'visaDetails'
        ));

        $filename = Str::slug($country->name) . '_details.pdf';

        return $pdf->download($filename);
    }
}
