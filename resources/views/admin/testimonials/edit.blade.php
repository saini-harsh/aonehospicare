@extends('layouts.admin')

@section('admin_content')
    <div style="margin-bottom: 30px;">
        <a href="/admin/testimonials" style="color: var(--primary); text-decoration: none; font-size: 14px; font-weight: 700; display: flex; align-items: center; gap: 8px; margin-bottom: 20px;">
            <i data-lucide="arrow-left" size="14"></i> BACK TO LIST
        </a>
        <h2 style="color: var(--primary); font-weight: 800;">Edit Testimonial</h2>
    </div>

    <div class="admin-card" style="max-width: 800px;">
        <form action="/admin/testimonials/{{ $testimonial->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: flex; flex-direction: column; gap: 25px;">
                <div class="form-group">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Reviewer Name</label>
                    <input type="text" name="name" value="{{ $testimonial->name }}" required style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                </div>

                <div class="form-group">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Designation / Medical Facility</label>
                    <input type="text" name="role" value="{{ $testimonial->role }}" style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                </div>

                <div class="form-group">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Review Content</label>
                    <textarea name="content" rows="6" required style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px; font-family: inherit;">{{ $testimonial->content }}</textarea>
                </div>

                <div class="form-group">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Reviewer Photo (Optional)</label>
                    @if($testimonial->image)
                        <img src="{{ asset('storage/' . $testimonial->image) }}" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; margin-bottom: 15px; border: 1px solid #eee;">
                    @endif
                    <div style="border: 2px dashed #e2e8f0; padding: 20px; border-radius: 15px; text-align: center; background: #fafbfc;">
                        <input type="file" name="image" style="width: 100%; font-size: 14px;">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 20px; border-radius: 15px; font-weight: 800; font-size: 1rem; margin-top: 10px;">UPDATE TESTIMONIAL</button>
            </div>
        </form>
    </div>
@endsection
