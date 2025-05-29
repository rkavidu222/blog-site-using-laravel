<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index')->with('categories', Category::all());
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'Category created successfully.');

        return redirect()->route('categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        // No flash message here, wait for update success

        return view('admin.category.edit')->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'Category updated successfully.');

        return redirect()->route('categories');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Session::flash('success', 'Category deleted successfully.');

        return redirect()->route('categories');
    }
}
