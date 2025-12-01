<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FooterDescription;

class FooterDescriptionController extends Controller
{
  public function FooterDescription()
    {
        $Footers = FooterDescription::all();
        return view('footer_description.index', compact('Footers'));
    }

    // Create page
    public function FooterDescriptionCreate()
    {
        return view('footer_description.create');
    }

    // Store data
    public function FooterDescriptionStore(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);

        FooterDescription::create([
            'description' => $request->description
        ]);

        return redirect()->route('footer_description')
                         ->with('success', 'Description added successfully!');
    }

    // Edit page
    public function FooterDescriptionEdit($id)
    {
        $footer = FooterDescription::findOrFail($id);
        return view('footer_description.create', compact('footer'));
    }

    // Update data
    public function FooterDescriptionUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $footer = FooterDescription::findOrFail($id);
        $footer->update([
            'description' => $request->description
        ]);

        return redirect()->route('footer_description')
                         ->with('success', 'Description updated successfully!');
    }

    // Delete data
    public function FooterDescriptionDestroy($id)
    {
        FooterDescription::findOrFail($id)->delete();

        return redirect()->route('footer_description')
                         ->with('success', 'Description deleted successfully!');
    }
}
