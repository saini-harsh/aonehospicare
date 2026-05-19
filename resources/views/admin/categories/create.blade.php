@extends('layouts.admin')

@section('admin_content')
    <div style="margin-bottom: 30px;">
        <a href="/admin/categories" style="color: var(--primary); text-decoration: none; font-size: 14px; font-weight: 700; display: flex; align-items: center; gap: 8px; margin-bottom: 20px;">
            <i data-lucide="arrow-left" size="14"></i> BACK TO CATEGORIES
        </a>
        <h2 style="color: var(--primary); font-weight: 800;">Create Category</h2>
        <p style="color: #64748b; font-size: 14px;">Add a new classification for your medical equipment inventory.</p>
    </div>

    <div class="admin-card" style="max-width: 800px;">
        <form action="/admin/categories" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr; gap: 25px;">
                <div class="form-group">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Category Name</label>
                    <input type="text" name="name" placeholder="e.g. ICU/OT Care Beds" required style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                </div>

                <div class="form-group">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Category Icon / Image</label>
                    <div style="border: 2px dashed #e2e8f0; padding: 40px; border-radius: 20px; text-align: center; background: #fafbfc;">
                        <i data-lucide="upload-cloud" size="40" style="color: #94a3b8; margin-bottom: 15px;"></i>
                        <p style="font-size: 14px; color: #64748b; margin-bottom: 15px;">Drag and drop or click to upload (WebP/PNG recommended)</p>
                        <input type="file" name="image" style="font-size: 14px;">
                    </div>
                </div>

                <div style="padding-top: 20px; border-top: 1px solid #f1f5f9; display: flex; gap: 15px;">
                    <button type="submit" class="btn btn-primary" style="padding: 15px 40px; border-radius: 12px; font-weight: 800;">SAVE CATEGORY</button>
                    <a href="/admin/categories" class="btn btn-outline" style="padding: 15px 40px; border-radius: 12px; font-weight: 800; border-color: #cbd5e0; color: #64748b; text-decoration: none; display: inline-flex; align-items: center;">CANCEL</a>
                </div>
            </div>
        </form>
    </div>
@endsection
