<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Category;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    // Display a listing of the countries
    public function Country()
    {
        $countries = Country::with('category')->paginate(10);
        return view('country.country_view', compact('countries'));
    }

    // Show the form for creating a new country
    public function CountryCreate()
    {
        $categories = Category::all();
        return view('country.country_create', compact('categories'));
    }

    // Store a newly created country in storage
   public function CountryStore(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:countries',
            'name' => 'required',
            'category_id' => 'required',
            'day' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imageNames = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/countries'), $imageName);
                $imageNames[] = $imageName;
            }
        }

        Country::create([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'day' => $request->input('day'),
            'images' => $imageNames, // No need for json_encode with casting
        ]);

        return redirect()->route('country')->with('success', 'Country created successfully.');
    }

    public function CountryEdit($id)
    {
        $country = Country::findOrFail($id);
        // dd($country);
        $categories = Category::all();
        return view('country.country_create', compact('country', 'categories'));
    }

    public function CountryUpdate(Request $request, $id)
{
    $request->validate([
        'code' => 'required|unique:countries,code,' . $id,
        'name' => 'required',
        'category_id' => 'required',
        'day' => 'required',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $country = Country::findOrFail($id);

    // Get existing images and ensure it's an array
    $existingImages = $country->images ?? [];

    // If images is stored as JSON string, decode it
    if (is_string($existingImages)) {
        $existingImages = json_decode($existingImages, true) ?? [];
    }

    // Ensure it's always an array
    if (!is_array($existingImages)) {
        $existingImages = [];
    }

    // Initialize removedImages as empty array
    $removedImages = [];

    // Handle image removal
    if ($request->filled('removed_images')) {
        $removedImages = explode(',', $request->input('removed_images'));

        // Delete files from storage
        foreach ($removedImages as $image) {
            $imagePath = public_path('images/countries/' . trim($image));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }

    // Remove deleted images from existingImages array
    $existingImages = array_values(array_diff($existingImages, $removedImages));

    // Handle new image uploads
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/countries'), $imageName);
            $existingImages[] = $imageName;
        }
    }

    // Update the country
    $country->update([
        'code' => $request->input('code'),
        'name' => $request->input('name'),
        'category_id' => $request->input('category_id'),
        'day' => $request->input('day'),
        'images' => $existingImages, // No need for json_encode with casting
    ]);

    return redirect()->route('country')->with('success', 'Country updated successfully.');
}

    // Remove the specified country from storage
    public function CountryDestroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return redirect()->route('country')->with('success', 'Country deleted successfully.');
    }
}
