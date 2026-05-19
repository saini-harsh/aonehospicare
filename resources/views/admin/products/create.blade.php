@extends('layouts.admin')

@section('admin_content')
    <div style="margin-bottom: 30px;">
        <a href="/admin/products" style="color: var(--primary); text-decoration: none; font-size: 14px; font-weight: 700; display: flex; align-items: center; gap: 8px; margin-bottom: 20px;">
            <i data-lucide="arrow-left" size="14"></i> BACK TO INVENTORY
        </a>
        <h2 style="color: var(--primary); font-weight: 800;">Add Product</h2>
        <p style="color: #64748b; font-size: 14px;">Register a new piece of medical equipment in the digital catalog.</p>
    </div>

    <div class="admin-card">
        <form action="/admin/products" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
                <!-- Main Info -->
                <div style="display: flex; flex-direction: column; gap: 25px;">
                    <div class="form-group">
                        <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Product Title</label>
                        <input type="text" name="title" placeholder="e.g. AONE 104 A - Advanced ICU Bed" required style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                    </div>

                    <div class="form-group">
                        <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Product Features & Description</label>
                        <textarea name="features" rows="8" placeholder="List technical specifications and key benefits..." style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px; font-family: inherit;"></textarea>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 15px;">
                        <div class="form-group">
                            <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Product Code</label>
                            <input type="text" name="code" placeholder="e.g. AONE-104A" style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">HSN Code</label>
                            <input type="text" name="hsn_code" placeholder="e.g. 9402" style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div class="form-group">
                            <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Base Price (INR)</label>
                            <input type="number" name="price" placeholder="0.00" style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">GST Slab (%)</label>
                            <input type="number" name="gst_percentage" placeholder="0" step="0.01" style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Product Gallery (Multi-upload)</label>
                        <input type="file" name="gallery[]" multiple style="width: 100%; padding: 15px; border: 2px dashed #e2e8f0; border-radius: 12px; background: #fafbfc;">
                    </div>

                    <div style="background: #f8fafc; padding: 30px; border-radius: 20px; border: 1px solid #e2e8f0; margin-top: 20px;">
                        <h3 style="color: var(--primary); font-size: 1.1rem; font-weight: 800; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                            <i data-lucide="search" size="18"></i> SEO METADATA (OPTIONAL)
                        </h3>
                        
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); margin-bottom: 8px; text-transform: uppercase;">Meta Title</label>
                            <input type="text" name="meta_title" placeholder="If empty, title will be used" style="width: 100%; padding: 12px 15px; border: 1px solid #d1d5db; border-radius: 10px; font-size: 14px;">
                        </div>

                        <div class="form-group" style="margin-bottom: 20px;">
                            <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); margin-bottom: 8px; text-transform: uppercase;">Meta Description</label>
                            <textarea name="meta_description" rows="3" placeholder="If empty, features will be used" style="width: 100%; padding: 12px 15px; border: 1px solid #d1d5db; border-radius: 10px; font-size: 14px; font-family: inherit;"></textarea>
                        </div>

                        <div class="form-group">
                            <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); margin-bottom: 8px; text-transform: uppercase;">Meta Keywords</label>
                            <input type="text" name="meta_keywords" placeholder="Comma separated keywords" style="width: 100%; padding: 12px 15px; border: 1px solid #d1d5db; border-radius: 10px; font-size: 14px;">
                        </div>
                    </div>
                </div>

                <!-- Sidebar Settings -->
                <div style="display: flex; flex-direction: column; gap: 25px;">
                    <div class="form-group">
                        <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Equipment Category</label>
                        <select name="category_id" required style="width: 100%; padding: 15px; border: 2px solid #eef2f6; border-radius: 12px; background: white;">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Main Display Image</label>
                        <div style="border: 2px dashed #e2e8f0; padding: 20px; border-radius: 15px; text-align: center; background: #fafbfc;">
                            <i data-lucide="image" size="30" style="color: #94a3b8; margin-bottom: 10px;"></i>
                            <input type="file" name="image" style="width: 100%; font-size: 12px;">
                        </div>
                    </div>

                    <div style="background: #f0fdf4; padding: 25px; border-radius: 20px; border: 1px solid #dcfce7; margin-bottom: 15px;">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div>
                                <h5 style="color: #166534; font-weight: 800; margin-bottom: 5px;">Latest Arrival?</h5>
                                <p style="font-size: 12px; color: #166534; opacity: 0.8;">Display this on the homepage.</p>
                            </div>
                            <input type="checkbox" name="is_latest" value="1" style="width: 24px; height: 24px; accent-color: var(--secondary);">
                        </div>
                    </div>

                    <div style="background: #eff6ff; padding: 25px; border-radius: 20px; border: 1px solid #dbeafe;">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div>
                                <h5 style="color: #1e40af; font-weight: 800; margin-bottom: 5px;">Best Seller?</h5>
                                <p style="font-size: 12px; color: #1e40af; opacity: 0.8;">Mark as a top selling item.</p>
                            </div>
                            <input type="checkbox" name="is_bestseller" value="1" style="width: 24px; height: 24px; accent-color: #3b82f6;">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 20px; border-radius: 15px; font-weight: 800; font-size: 1rem; margin-top: 10px;">PUBLISH EQUIPMENT</button>
                </div>
            </div>
        </form>
    </div>
@endsection
