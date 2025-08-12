<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function Category()
    {
        $category = Category::all();
        return view('category.view_category',compact('category'));
    }

    public function CategoryCreate()
    {
        return view('category.create_category');
    }

    public function CategoryStore(Request $request)
    {
       Category::insert([
        'name' => $request->input('name'),
       ]);
       return redirect()->route('category')->with('success','Category created successfully');
    }

    public function CategoryEdit($id)
    {
        $category = Category::find($id);
        return view('category.create_category',compact('category'));
    }

    public function CategoryUpdate(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('category')->with('success','Category updated successfully');
    }

    public function CategoryDestroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category')->with('success','Category deleted successfully');
    }
}
