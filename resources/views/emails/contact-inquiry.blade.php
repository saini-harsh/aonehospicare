<x-mail::message>
# New Inquiry Received: {{ ucfirst(str_replace('_', ' ', $formData['form_type'] ?? 'General Inquiry')) }}

@foreach($formData as $key => $value)
@if($key !== 'form_type' && !empty($value))
**{{ ucfirst(str_replace('_', ' ', $key)) }}:** {{ is_array($value) ? implode(', ', $value) : $value }}  
@endif
@endforeach

<x-mail::panel>
Please check the website admin or contact the customer directly for any attached files.
</x-mail::panel>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
