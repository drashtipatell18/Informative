<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
class ServiceController extends Controller
{
    public function Service()
    {
        $services = Service::all();
        return view('service.view_service',compact('services'));
    }

    public function ServiceCreate()
    {
        return view('service.create_service');
    }

    public function ServiceStore(Request $request)
    {
        $image_name = null;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/services'),$image_name);
        }
        Service::insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $image_name,
        ]);
        return redirect()->route('service')->with('success','Service created successfully');
    }

    public function ServiceEdit($id)
    {
        $service = Service::find($id);
        return view('service.create_service',compact('service'));
    }

    public function ServiceUpdate(Request $request, $id)
    {
        $service = Service::find($id);
        $oldPhoto = $service->image;

        if ($request->hasFile('image')) {
            // Handle new file upload
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/services'), $filename);

            // Delete old photo file if it exists
            if ($oldPhoto && file_exists(public_path('images/services/' . $oldPhoto))) {
                unlink(public_path('images/services/' . $oldPhoto));
            }

            $newPhoto = $filename;
        } else {
            // Retain the old photo if no new file is uploaded
            $newPhoto = $request->input('old_photo');
        }
        $service->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $newPhoto,

        ]);

        return redirect()->route('service')->with('success','Service updated successfully');
    }

    public function ServiceDestroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('service')->with('success','Service deleted successfully');
    }
}
