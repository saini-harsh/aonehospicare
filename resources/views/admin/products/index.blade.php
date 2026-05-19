@extends('layouts.admin')

@section('admin_content')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 38px;
            height: 20px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #e2e8f0;
            transition: .3s;
            border-radius: 20px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 14px;
            width: 14px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .3s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: var(--primary);
        }

        input:checked + .slider:before {
            transform: translateX(18px);
        }
    </style>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h2 style="color: var(--primary); font-weight: 800;">Equipment Inventory</h2>
            <p style="color: #64748b; font-size: 14px;">Manage your specialized medical products and equipment.</p>
        </div>
        <a href="/admin/products/create" class="btn btn-primary" style="display: flex; align-items: center; gap: 10px;">
            <i data-lucide="plus-circle" size="18"></i> Add New Product
        </a>
    </div>

    <div class="admin-card">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Code / HSN</th>
                    <th>Price</th>
                    <th style="text-align: center;">Best Seller</th>
                    <th style="text-align: center;">Latest</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" style="width: 50px; height: 50px; border-radius: 10px; object-fit: cover; background: #f8fafc; border: 1px solid #eef2f6;">
                            @else
                                <div style="width: 50px; height: 50px; border-radius: 10px; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #94a3b8;"><i data-lucide="image" size="20"></i></div>
                            @endif
                            <div>
                                <p style="margin: 0; font-weight: 700; color: var(--primary);">{{ $product->title }}</p>
                                <p style="margin: 0; font-size: 11px; color: #64748b;">slug: {{ $product->slug }}</p>
                            </div>
                        </div>
                    </td>
                    <td><span style="background: #e0f2fe; color: #0369a1; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 700;">{{ $product->category->name }}</span></td>
                    <td>
                        <code>{{ $product->code ?? 'N/A' }}</code>
                        @if($product->hsn_code)
                            <div style="font-size: 10px; color: #64748b; margin-top: 5px;">HSN: {{ $product->hsn_code }}</div>
                        @endif
                    </td>
                    <td>₹{{ number_format($product->price, 2) }}</td>
                    <td style="text-align: center;">
                        <label class="switch">
                            <input type="checkbox" id="bestseller-switch-{{ $product->id }}" 
                                {{ $product->is_bestseller ? 'checked' : '' }} 
                                onchange="toggleStatus({{ $product->id }}, 'bestseller')">
                            <span class="slider"></span>
                        </label>
                    </td>
                    <td style="text-align: center;">
                        <label class="switch">
                            <input type="checkbox" id="latest-switch-{{ $product->id }}" 
                                {{ $product->is_latest ? 'checked' : '' }} 
                                onchange="toggleStatus({{ $product->id }}, 'latest')">
                            <span class="slider"></span>
                        </label>
                    </td>
                    <td>{{ $product->created_at->format('d M, Y') }}</td>
                    <td>
                        <div style="display: flex; gap: 15px;">
                            <a href="/admin/products/{{ $product->id }}/edit" style="color: var(--primary);"><i data-lucide="edit-3" size="18"></i></a>
                            <a href="/admin/products/{{ $product->id }}/delete" style="color: #ef4444;" onclick="return confirm('Delete this product?')"><i data-lucide="trash-2" size="18"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach

                @if($products->isEmpty())
                <tr>
                    <td colspan="8" style="text-align: center; padding: 50px; color: #94a3b8;">
                        <i data-lucide="package-search" size="40" style="margin-bottom: 20px;"></i>
                        <p>No products found in inventory. Start by adding your medical equipment.</p>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    @if($products->hasPages())
        <div style="margin-top: 30px; display: flex; justify-content: center;">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    @endif

    <script>
        function toggleStatus(id, type) {
            let url = type === 'latest' ? '{{ route("admin.products.toggleLatest") }}' : '{{ route("admin.products.toggleBestseller") }}';
            
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ id: id })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Success
                } else {
                    alert('Failed to update: ' + (data.message || 'Unknown error'));
                    document.getElementById(type + '-switch-' + id).checked = !document.getElementById(type + '-switch-' + id).checked;
                }
            })
            .catch(err => {
                console.error('Error toggling status:', err);
                alert('Connection error or server failure');
                document.getElementById(type + '-switch-' + id).checked = !document.getElementById(type + '-switch-' + id).checked;
            });
        }
    </script>
@endsection
