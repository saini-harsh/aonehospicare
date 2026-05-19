<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'code' => 'nullable',
            'image' => 'nullable|image',
            'gallery.*' => 'nullable|image'
        ]);

        $slug = Str::slug($request->title);

        // Ensure slug is unique
        $originalSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $galleryPaths = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $galleryPaths[] = $file->store('products/gallery', 'public');
            }
        }

        Product::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $slug,
            'image' => $imagePath,
            'gallery' => $galleryPaths,
            'features' => $request->features,
            'code' => $request->code,
            'hsn_code' => $request->hsn_code,
            'price' => $request->price ?? 0,
            'gst_percentage' => $request->gst_percentage ?? 0,
            'is_latest' => $request->has('is_latest'),
            'is_bestseller' => $request->has('is_bestseller'),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect('/admin/products')->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'code' => 'nullable',
            'image' => 'nullable|image',
            'gallery.*' => 'nullable|image'
        ]);

        // Use manual slug if provided, else generate from title
        $slug = $request->slug ?: Str::slug($request->title);

        // Ensure slug is unique (excluding current product)
        $originalSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $file) {
                $galleryPaths[] = $file->store('products/gallery', 'public');
            }
            $product->gallery = array_merge($product->gallery ?? [], $galleryPaths);
        }

        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->slug = $slug;
        $product->features = $request->features;
        $product->code = $request->code;
        $product->hsn_code = $request->hsn_code;
        $product->price = $request->price ?? 0;
        $product->gst_percentage = $request->gst_percentage ?? 0;
        $product->is_latest = $request->has('is_latest');
        $product->is_bestseller = $request->has('is_bestseller');
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->save();

        return redirect('/admin/products')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect('/admin/products')->with('success', 'Product deleted successfully');
    }

    public function toggleLatest(Request $request)
    {
        try {
            $product = Product::findOrFail($request->input('id'));
            $product->is_latest = !$product->is_latest;
            $product->save();
            return response()->json(['success' => true, 'status' => $product->is_latest]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function toggleBestseller(Request $request)
    {
        try {
            $product = Product::findOrFail($request->input('id'));
            $product->is_bestseller = !$product->is_bestseller;
            $product->save();
            return response()->json(['success' => true, 'status' => $product->is_bestseller]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function deleteMainImage($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
            $product->image = null;
            $product->save();
        }
        return back()->with('success', 'Main image deleted successfully');
    }

    public function deleteGalleryImage(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $imagePath = $request->query('image');

        
        if ($product->gallery && in_array($imagePath, $product->gallery)) {
            Storage::disk('public')->delete($imagePath);
            $gallery = $product->gallery;
            $gallery = array_values(array_diff($gallery, [$imagePath]));
            $product->gallery = $gallery;
            $product->save();
        }
        
        return back()->with('success', 'Gallery image deleted successfully');
    }
}

