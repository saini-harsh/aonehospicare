<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonials', 'public');
        }

        Testimonial::create([
            'name' => $request->name,
            'role' => $request->role,
            'content' => $request->content,
            'image' => $imagePath
        ]);

        return redirect('/admin/testimonials')->with('success', 'Testimonial added successfully');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        $request->validate(['name' => 'required', 'content' => 'required']);

        if ($request->hasFile('image')) {
            $testimonial->image = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->name = $request->name;
        $testimonial->role = $request->role;
        $testimonial->content = $request->content;
        $testimonial->save();

        return redirect('/admin/testimonials')->with('success', 'Testimonial updated successfully');
    }

    public function destroy($id)
    {
        Testimonial::findOrFail($id)->delete();
        return redirect('/admin/testimonials')->with('success', 'Testimonial deleted successfully');
    }
}
