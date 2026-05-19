@extends('layouts.admin')

@section('admin_content')
<div class="admin-card">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 30px; gap: 20px;">
        <div style="flex: 1;">
            <h3 style="color: var(--primary); font-weight: 800; margin-bottom: 8px;">Stakeholder Management</h3>
            <p style="font-size: 13px; color: #64748b;">Review and manage registered healthcare practitioners and institutions</p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Registration Date</th>
                <th>Stakeholder Details</th>
                <th>Contact info</th>
                <th>Clinical / Hospital Address</th>
                <th style="text-align: right;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td style="white-space: nowrap; font-size: 13px;">{{ $user->created_at->format('d M Y') }}</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 35px; height: 35px; background: rgba(0, 77, 64, 0.1); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 12px;">
                            {{ substr($user->name, 0, 2) }}
                        </div>
                        <div>
                            <span style="display: block; font-weight: 800; color: var(--primary);">{{ $user->name }}</span>
                        </div>
                    </div>
                </td>
                <td>
                    <div style="line-height: 1.4;">
                        <span style="display: block; font-size: 13px; color: var(--primary);">{{ $user->email }}</span>
                        <span style="display: block; font-size: 12px; color: #64748b;">{{ $user->phone ?? 'No Phone' }}</span>
                    </div>
                </td>
                <td style="max-width: 300px; font-size: 12px; line-height: 1.6; color: #475569;">
                    @if($user->address)
                        <strong>{{ $user->address }}</strong><br>
                        {{ $user->city }}, {{ $user->state }} - {{ $user->pincode }}
                    @else
                        <span style="opacity: 0.5;">No address saved</span>
                    @endif
                </td>
                <td style="text-align: right;">
                    <form action="{{ url('/admin/users/'.$user->id) }}" method="POST" onsubmit="return confirm('Revoke access and delete this user?')" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: #fef2f2; color: #dc2626; border: none; padding: 8px 12px; border-radius: 8px; cursor: pointer;">
                            <i data-lucide="user-minus" size="16"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
