<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function Testimonial(){
        $testimonials = Testimonial::all();
        return view('testimonial.view_tesimonial',compact('testimonials'));
    }

    public function TestimonialCreate(){
        return view('testimonial.create_testimonial');
    }

    public function TestimonialStore(Request $request){
        $ImageName = null;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ImageName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/testimnial'),$ImageName);
        }
        Testimonial::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $ImageName
        ]);

        return redirect()->route('testimonial')->with('success', 'Testimonial created successfully.');

    }

    public function TestimonialEdit($id){
         $testimonial = Testimonial::findOrFail($id);
        return view('testimonial.create_testimonial', compact('testimonial'));
    }

    public function TestimonialUpdate(Request $request, $id){


        $testimonial = Testimonial::findOrFail($id);

        $ImageName = $testimonial->image;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($ImageName && file_exists(public_path('images/testimonial/' . $ImageName))) {
                unlink(public_path('images/testimonial/' . $ImageName));
            }

            $file = $request->file('image');
            $ImageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/testimonial'), $ImageName);
        }

        $testimonial->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $ImageName,
        ]);

        return redirect()->route('testimonial')->with('success', 'Testimonial updated successfully.');
    }
    public function TestimonialDestroy($id){
        $testimonial = Testimonial::findOrFail($id);

        // Delete image from storage
        if ($testimonial->image && file_exists(public_path('images/testimonial/' . $testimonial->image))) {
            unlink(public_path('images/testimonial/' . $testimonial->image));
        }

        $testimonial->delete();

        return redirect()->back()->with('success', 'Testimonial deleted successfully.');
    }

}
