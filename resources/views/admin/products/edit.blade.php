@extends('layouts.admin')

@section('admin_content')
    <div style="margin-bottom: 30px;">
        <a href="/admin/products" style="color: var(--primary); text-decoration: none; font-size: 14px; font-weight: 700; display: flex; align-items: center; gap: 8px; margin-bottom: 20px;">
            <i data-lucide="arrow-left" size="14"></i> BACK TO INVENTORY
        </a>
        <h2 style="color: var(--primary); font-weight: 800;">Edit Product: {{ $product->title }}</h2>
    </div>

    <div class="admin-card">
        <form action="/admin/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
                <!-- Main Info -->
                <div style="display: flex; flex-direction: column; gap: 25px;">
                    <div class="form-group">
                        <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Product Title</label>
                        <input type="text" name="title" value="{{ $product->title }}" required style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                    </div>

                    <div class="form-group">
                        <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">URL Slug (Advanced)</label>
                        <input type="text" name="slug" value="{{ $product->slug }}" placeholder="manual-derma-chair" style="width: 100%; padding: 12px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 14px; background: #f8fafc;">
                        <p style="font-size: 11px; color: #64748b; margin-top: 5px;">Warning: Changing this will break existing links to this product. Recommended: <strong>manual-derma-chair</strong></p>
                    </div>

                    <div class="form-group">
                        <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Product Features & Description</label>
                        <textarea name="features" rows="8" style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px; font-family: inherit;">{{ $product->features }}</textarea>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 15px;">
                        <div class="form-group">
                            <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Product Code</label>
                            <input type="text" name="code" value="{{ $product->code }}" style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">HSN Code</label>
                            <input type="text" name="hsn_code" value="{{ $product->hsn_code }}" style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div class="form-group">
                            <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Base Price (INR)</label>
                            <input type="number" name="price" value="{{ $product->price }}" style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">GST Slab (%)</label>
                            <input type="number" name="gst_percentage" value="{{ $product->gst_percentage }}" step="0.01" style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Product Gallery</label>
                        @if($product->gallery)
                            <div style="display: flex; gap: 15px; margin-bottom: 15px; flex-wrap: wrap;">
                                @foreach($product->gallery as $gImg)
                                    <div style="position: relative; display: inline-block;">
                                        <img src="{{ asset('storage/' . $gImg) }}" style="width: 80px; height: 80px; border-radius: 10px; object-fit: cover; border: 1px solid #eee;">
                                        <a href="{{ route('admin.products.deleteGallery', ['id' => $product->id, 'image' => $gImg]) }}" 
                                           onclick="return confirm('Delete this gallery image?')"
                                           style="position: absolute; top: -8px; right: -8px; background: #ef4444; color: white; border: none; border-radius: 50%; width: 22px; height: 22px; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 0; box-shadow: 0 2px 5px rgba(0,0,0,0.2); text-decoration: none;">
                                            <i data-lucide="x" size="14"></i>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <input type="file" name="gallery[]" multiple style="width: 100%; padding: 15px; border: 2px dashed #e2e8f0; border-radius: 12px;">
                    </div>

                    <div style="background: #f8fafc; padding: 30px; border-radius: 20px; border: 1px solid #e2e8f0; margin-top: 20px;">
                        <h3 style="color: var(--primary); font-size: 1.1rem; font-weight: 800; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                            <i data-lucide="search" size="18"></i> SEO METADATA (OPTIONAL)
                        </h3>
                        
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); margin-bottom: 8px; text-transform: uppercase;">Meta Title</label>
                            <input type="text" name="meta_title" value="{{ $product->meta_title }}" placeholder="If empty, title will be used" style="width: 100%; padding: 12px 15px; border: 1px solid #d1d5db; border-radius: 10px; font-size: 14px;">
                        </div>

                        <div class="form-group" style="margin-bottom: 20px;">
                            <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); margin-bottom: 8px; text-transform: uppercase;">Meta Description</label>
                            <textarea name="meta_description" rows="3" placeholder="If empty, features will be used" style="width: 100%; padding: 12px 15px; border: 1px solid #d1d5db; border-radius: 10px; font-size: 14px; font-family: inherit;">{{ $product->meta_description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); margin-bottom: 8px; text-transform: uppercase;">Meta Keywords</label>
                            <input type="text" name="meta_keywords" value="{{ $product->meta_keywords }}" placeholder="Comma separated keywords" style="width: 100%; padding: 12px 15px; border: 1px solid #d1d5db; border-radius: 10px; font-size: 14px;">
                        </div>
                    </div>
                </div>

                <!-- Sidebar Settings -->
                <div style="display: flex; flex-direction: column; gap: 25px;">
                    <div class="form-group">
                        <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Equipment Category</label>
                        <select name="category_id" required style="width: 100%; padding: 15px; border: 2px solid #eef2f6; border-radius: 12px; background: white;">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Update Main Image</label>
                        @if($product->image)
                            <div style="position: relative; width: 100%; margin-bottom: 15px;">
                                <img src="{{ asset('storage/' . $product->image) }}" style="width: 100%; height: 180px; border-radius: 15px; object-fit: cover; border: 1px solid #eee;">
                                <a href="{{ route('admin.products.deleteImage', $product->id) }}" 
                                   onclick="return confirm('Delete main image?')"
                                   style="position: absolute; top: 10px; right: 10px; background: #ef4444; color: white; border: none; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 4px 12px rgba(0,0,0,0.15); text-decoration: none;">
                                    <i data-lucide="trash-2" size="18"></i>
                                </a>
                            </div>
                        @endif
                        <input type="file" name="image" style="width: 100%; font-size: 12px;">
                    </div>

                    <div style="background: #f0fdf4; padding: 25px; border-radius: 20px; border: 1px solid #dcfce7; margin-bottom: 15px;">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div>
                                <h5 style="color: #166534; font-weight: 800; margin-bottom: 5px;">Latest Arrival?</h5>
                                <p style="font-size: 12px; color: #166534; opacity: 0.8;">Show on homepage grid.</p>
                            </div>
                            <input type="checkbox" name="is_latest" value="1" {{ $product->is_latest ? 'checked' : '' }} style="width: 24px; height: 24px;">
                        </div>
                    </div>

                    <div style="background: #eff6ff; padding: 25px; border-radius: 20px; border: 1px solid #dbeafe;">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div>
                                <h5 style="color: #1e40af; font-weight: 800; margin-bottom: 5px;">Best Seller?</h5>
                                <p style="font-size: 12px; color: #1e40af; opacity: 0.8;">Mark as a top selling item.</p>
                            </div>
                            <input type="checkbox" name="is_bestseller" value="1" {{ $product->is_bestseller ? 'checked' : '' }} style="width: 24px; height: 24px; accent-color: #3b82f6;">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 20px; border-radius: 15px; font-weight: 800; font-size: 1rem;">UPDATE PRODUCT</button>
                </div>
            </div>
        </form>
    </div>
@endsection
