<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $imagePath
        ]);

        return redirect('/admin/categories')->with('success', 'Category created successfully');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect('/admin/categories')->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect('/admin/categories')->with('success', 'Category deleted successfully');
    }
}
