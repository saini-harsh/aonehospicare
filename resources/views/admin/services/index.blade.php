@extends('layouts.admin')

@section('admin_content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2 style="color: var(--primary); font-weight: 800; margin: 0;">Clinical Services</h2>
        <a href="/admin/services/create" class="btn btn-primary" style="padding: 12px 25px; border-radius: 12px; text-decoration: none; display: flex; align-items: center; gap: 10px;">
            <i data-lucide="plus" size="18"></i> Add New Service
        </a>
    </div>

    @if(session('success'))
    <div style="background: #f0fdf4; color: #166534; padding: 15px 20px; border-radius: 12px; margin-bottom: 30px; border: 1px solid #dcfce7; font-weight: 600;">
        {{ session('success') }}
    </div>
    @endif

    <div class="admin-card">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Service Title</th>
                    <th>Status</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>
                        <div style="width: 60px; height: 60px; background: #f8fafc; border-radius: 12px; overflow: hidden;">
                            @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #cbd5e0;">
                                <i data-lucide="shield" size="24"></i>
                            </div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div style="font-weight: 700; color: var(--primary);">{{ $service->title }}</div>
                        <div style="font-size: 12px; color: #64748b; max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $service->description }}</div>
                    </td>
                    <td>
                        <span style="background: #ecfdf5; color: #059669; padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 700;">ACTIVE</span>
                    </td>
                    <td>{{ $service->created_at->format('d M, Y') }}</td>
                    <td>
                        <div style="display: flex; gap: 10px;">
                            <a href="/admin/services/{{ $service->id }}/edit" style="color: var(--primary);"><i data-lucide="edit-3" size="18"></i></a>
                            <a href="/admin/services/{{ $service->id }}/delete" onclick="return confirm('Are you sure you want to delete this service?')" style="color: #ef4444;"><i data-lucide="trash-2" size="18"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
