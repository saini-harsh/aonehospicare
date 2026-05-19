@extends('layouts.admin')

@section('admin_content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h2 style="color: var(--primary); font-weight: 800;">Equipment Categories</h2>
            <p style="color: #64748b; font-size: 14px;">Manage your hospital-grade equipment classification.</p>
        </div>
        <a href="/admin/categories/create" class="btn btn-primary" style="display: flex; align-items: center; gap: 10px;">
            <i data-lucide="plus-circle" size="18"></i> Add New Category
        </a>
    </div>

    <div class="admin-card">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Slug</th>
                    <th>Total Products</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>
                        @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" style="width: 50px; height: 50px; border-radius: 10px; object-fit: cover; background: #f8fafc; padding: 5px; border: 1px solid #eef2f6;">
                        @else
                            <div style="width: 50px; height: 50px; border-radius: 10px; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #94a3b8;">
                                <i data-lucide="image" size="20"></i>
                            </div>
                        @endif
                    </td>
                    <td>{{ $category->name }}</td>
                    <td><code style="background: #f1f5f9; padding: 4px 8px; border-radius: 5px; font-size: 12px; color: #475569;">{{ $category->slug }}</code></td>
                    <td>{{ $category->products_count }} Products</td>
                    <td>{{ $category->created_at->format('d M, Y') }}</td>
                    <td>
                        <div style="display: flex; gap: 15px;">
                            <a href="/admin/categories/{{ $category->id }}/edit" style="color: var(--primary);"><i data-lucide="edit-3" size="18"></i></a>
                            <a href="/admin/categories/{{ $category->id }}/delete" style="color: #ef4444;" onclick="return confirm('Delete this category?')"><i data-lucide="trash-2" size="18"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach

                @if($categories->isEmpty())
                <tr>
                    <td colspan="6" style="text-align: center; padding: 50px; color: #94a3b8;">
                        <i data-lucide="package-search" size="40" style="margin-bottom: 20px;"></i>
                        <p>No categories found. Start by creating your first equipment category.</p>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
