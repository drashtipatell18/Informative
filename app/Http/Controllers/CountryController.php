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
            // Store image names as JSON
            'images' => json_encode($imageNames),
        ]);

        return redirect()->route('country')->with('success', 'Country created successfully.');
    }

    // Show the form for editing the specified country
    public function CountryEdit($id)
    {
        $country = Country::findOrFail($id);
        $categories = Category::all();
        return view('country.country_create', compact('country', 'categories'));
    }

    // Update the specified country in storage
    public function CountryUpdate(Request $request, $id)
    {
        $country = Country::findOrFail($id);

        // Get existing images from DB (decode JSON to array)
        $existingImages = json_decode($country->images, true) ?? [];

        // Handle image removal
        if ($request->filled('removed_images')) {
            $removedImages = explode(',', $request->input('removed_images'));

            // Delete files from storage
            foreach ($removedImages as $image) {
                $imagePath = public_path('images/countries/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Remove deleted images from existingImages array
            $existingImages = array_values(array_diff($existingImages, $removedImages));
        }

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
            'images' => json_encode($existingImages),
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
