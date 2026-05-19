@extends('layouts.admin')

@section('admin_content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h2 style="color: var(--primary); font-weight: 800;">Client Testimonials</h2>
            <p style="color: #64748b; font-size: 14px;">Manage your customer reviews and success stories.</p>
        </div>
        <a href="/admin/testimonials/create" class="btn btn-primary" style="padding: 12px 25px; border-radius: 12px; display: flex; align-items: center; gap: 10px; font-weight: 700;">
            <i data-lucide="plus-circle" size="20"></i> Add New Testimonial
        </a>
    </div>

    <div class="admin-card">
        @if(session('success'))
            <div style="background: #f0fdf4; color: #166534; padding: 15px; border-radius: 10px; margin-bottom: 20px; font-weight: 600;">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Reviewer</th>
                    <th>Role/Facility</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th style="text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $test)
                <tr>
                    <td>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <div style="width: 45px; height: 45px; background: #f8fafc; border-radius: 50%; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                @if($test->image)
                                    <img src="{{ asset('storage/' . $test->image) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <i data-lucide="user" size="20" style="color: #94a3b8;"></i>
                                @endif
                            </div>
                            <span style="font-weight: 800;">{{ $test->name }}</span>
                        </div>
                    </td>
                    <td>{{ $test->role ?? 'Client' }}</td>
                    <td style="max-width: 300px; font-weight: 400; color: #64748b; font-size: 13px;">{{ Str::limit($test->content, 100) }}</td>
                    <td>{{ $test->created_at->format('d M, Y') }}</td>
                    <td style="text-align: right;">
                        <a href="/admin/testimonials/{{ $test->id }}/edit" style="color: var(--primary); margin-right: 15px;"><i data-lucide="edit-3" size="18"></i></a>
                        <a href="/admin/testimonials/{{ $test->id }}/delete" onclick="return confirm('Delete this testimonial?')" style="color: #ef4444;"><i data-lucide="trash-2" size="18"></i></a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" style="text-align: center; padding: 40px; color: #94a3b8;">No testimonials found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
