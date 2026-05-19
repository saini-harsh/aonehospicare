@extends('layouts.admin')

@section('admin_content')
<div class="admin-card">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 30px; gap: 20px;">
        <div style="flex: 1;">
            <h3 style="color: var(--primary); font-weight: 800;">Institutional & Support Inquiries</h3>
            <p style="font-size: 13px; color: #64748b;">Managing clinical leads from all platform channels</p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Channel</th>
                <th>Stakeholder</th>
                <th>Clinical Requirement</th>
                <th>Institutional Data</th>
                <th style="text-align: right;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inquiries as $inquiry)
            <tr>
                <td style="white-space: nowrap; font-size: 13px;">{{ $inquiry->created_at->format('d M Y') }}<br><span style="opacity: 0.6;">{{ $inquiry->created_at->format('h:i A') }}</span></td>
                <td>
                    <span style="padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 700; background: {{ $inquiry->form_type == 'return_bed' ? '#ecfdf5; color: #059669;' : '#eff6ff; color: #3b82f6;' }}">
                        {{ strtoupper(str_replace('_', ' ', $inquiry->form_type)) }}
                    </span>
                </td>
                <td>
                    <div style="line-height: 1.4;">
                        <span style="display: block; font-weight: 800; color: var(--primary);">{{ $inquiry->name }}</span>
                        <span style="display: block; font-size: 12px; color: #64748b;">{{ $inquiry->email }}</span>
                        <span style="display: block; font-size: 12px; color: #64748b;">{{ $inquiry->phone }}</span>
                    </div>
                </td>
                <td style="max-width: 250px;">
                    @if($inquiry->subject)
                        <strong style="color: var(--secondary); font-size: 12px;">{{ $inquiry->subject }}</strong><br>
                    @endif
                    <div style="font-size: 13px; font-weight: 400; color: #475569; margin-top: 5px;">{{ $inquiry->message }}</div>
                </td>
                <td style="font-size: 12px; color: #64748b; line-height: 1.6;">
                    @if($inquiry->additional_data)
                        @foreach($inquiry->additional_data as $key => $value)
                            <div style="margin-bottom: 2px;">
                                <span style="font-weight: 700; color: #475569;">{{ ucfirst(str_replace('_', ' ', $key)) }}:</span> 
                                {{ is_array($value) ? implode(', ', $value) : $value }}
                            </div>
                        @endforeach
                    @else
                        <span style="opacity: 0.4;">No extra data</span>
                    @endif
                </td>
                <td style="text-align: right;">
                    <form action="{{ url('/admin/inquiries/'.$inquiry->id) }}" method="POST" onsubmit="return confirm('Archive this inquiry record?')" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: #fef2f2; color: #dc2626; border: none; padding: 8px 12px; border-radius: 8px; cursor: pointer; transition: 0.2s;">
                            <i data-lucide="trash-2" size="16"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
