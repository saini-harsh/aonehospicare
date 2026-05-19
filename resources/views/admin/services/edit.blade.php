@extends('layouts.admin')

@section('admin_content')
    <div style="margin-bottom: 30px;">
        <a href="/admin/services" style="color: var(--primary); text-decoration: none; font-weight: 700; font-size: 14px; display: inline-flex; align-items: center; gap: 5px; margin-bottom: 15px;">
            <i data-lucide="arrow-left" size="14"></i> Back to Services
        </a>
        <h2 style="color: var(--primary); font-weight: 800; margin: 0;">Edit Clinical Service</h2>
    </div>

    <div class="admin-card" style="max-width: 800px;">
        <form action="/admin/services/{{ $service->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: grid; gap: 25px;">
                <div class="form-group">
                    <label style="display: block; font-weight: 700; color: var(--primary); margin-bottom: 10px; font-size: 13px; text-transform: uppercase;">Service Title</label>
                    <input type="text" name="title" value="{{ $service->title }}" required style="width: 100%; padding: 15px; border-radius: 12px; border: 1px solid #e2e8f0; font-weight: 600;">
                </div>

                <div class="form-group">
                    <label style="display: block; font-weight: 700; color: var(--primary); margin-bottom: 10px; font-size: 13px; text-transform: uppercase;">Service Icon (Lucide Icon Name)</label>
                    <input type="text" name="icon" value="{{ $service->icon }}" placeholder="e.g. shield, truck, settings" style="width: 100%; padding: 15px; border-radius: 12px; border: 1px solid #e2e8f0; font-weight: 600;">
                </div>

                <div class="form-group">
                    <label style="display: block; font-weight: 700; color: var(--primary); margin-bottom: 10px; font-size: 13px; text-transform: uppercase;">Service Headline Image</label>
                    @if($service->image)
                    <div style="width: 200px; height: 120px; border-radius: 12px; overflow: hidden; margin-bottom: 15px; border: 1px solid #e2e8f0;">
                        <img src="{{ asset('storage/' . $service->image) }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    @endif
                    <input type="file" name="image" style="width: 100%; padding: 12px; border-radius: 12px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                </div>

                <div class="form-group">
                    <label style="display: block; font-weight: 700; color: var(--primary); margin-bottom: 10px; font-size: 13px; text-transform: uppercase;">Service Description</label>
                    <textarea name="description" required rows="6" style="width: 100%; padding: 15px; border-radius: 12px; border: 1px solid #e2e8f0; font-weight: 600; resize: vertical;">{{ $service->description }}</textarea>
                </div>

                <div style="margin-top: 10px;">
                    <button type="submit" class="btn btn-primary" style="padding: 15px 40px; border-radius: 12px; font-weight: 800;">UPDATE SERVICE MANIFEST</button>
                </div>
            </div>
        </form>
    </div>
@endsection
