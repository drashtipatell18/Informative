<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
    public function Information()
    {
        $informations = Information::all();
        return view('information.view_information',compact('informations'));
    }

    public function InformationCreate()
    {
        return view('information.create_information');
    }

    public function InformationStore(Request $request)
    {
        Information::insert([
            'type' => $request->input('type'),
        ]);
        return redirect()->route('information')->with('success','Information created successfully');
    }

    public function InformationEdit($id)
    {
        $information = Information::find($id);
        return view('information.create_information',compact('information'));
    }

    public function InformationUpdate(Request $request, $id)
    {
        $information = Information::find($id);
        $information->update([
            'type' => $request->input('type'),
        ]);

        return redirect()->route('information')->with('success','Information updated successfully');
    }

    public function InformationDestroy($id)
    {
        $information = Information::find($id);
        $information->delete();
        return redirect()->route('information')->with('success','Information deleted successfully');
    }
}
