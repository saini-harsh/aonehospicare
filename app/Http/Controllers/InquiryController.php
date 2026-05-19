<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactInquiry;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'nullable'
        ]);

        $allData = $request->except(['_token', 'bed_images', 'id_proof']);
        
        // Prepare data for database
        $inquiry = new Inquiry();
        $inquiry->form_type = $request->input('form_type', 'general');
        $inquiry->name = $request->input('name');
        $inquiry->email = $request->input('email');
        $inquiry->phone = $request->input('phone');
        $inquiry->subject = $request->input('subject');
        $inquiry->message = $request->input('message');
        
        // Collect extra fields into additional_data
        $commonFields = ['form_type', 'name', 'email', 'phone', 'subject', 'message', '_token', 'bed_images', 'id_proof'];
        $inquiry->additional_data = $request->except($commonFields);
        
        $inquiry->save();
        
        // Send email to the company address provided by user
        Mail::to('aonehospicare01@gmail.com')->send(new ContactInquiry($allData));

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Your inquiry has been sent successfully!']);
        }

        return back()->with('success', 'Your inquiry has been sent successfully. We will get back to you soon!');
    }
}
