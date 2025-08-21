<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Silder;

class SliderController extends Controller
{
    public function Slider()
    {
        $sliders = Silder::all();
        return view('slider.view_slider', compact('sliders'));
    }

    public function SliderCreate()
    {
        return view('slider.create_slider');
    }

    public function SliderStore(Request $request)
    {
        $image_name = null;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/sliders'),$image_name);
        }
        Silder::insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $image_name,
        ]);
        return redirect()->route('slider')->with('success','Slider created successfully');
    }

    public function SliderEdit($id)
    {
        $slider = Silder::find($id);
        return view('slider.create_slider', compact('slider'));
    }

    public function SliderUpdate(Request $request, $id)
    {
        $slider = Silder::findOrFail($id); // Get the existing record

        // Validate input if needed
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            $oldImagePath = public_path('images/sliders/' . $slider->image);
            if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Upload new image
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/sliders'), $image_name);

            $slider->image = $image_name;
        }

        // Update other fields
        $slider->name = $request->input('name');
        $slider->description = $request->input('description');

        $slider->save();

        return redirect()->route('slider')->with('success', 'Slider updated successfully');
    }


    public function SliderDestroy($id)
    {
        $sliders = Silder::find($id);
        $sliders->delete();
        return redirect()->route('slider')->with('success','Slider deleted successfully');
    }
}
