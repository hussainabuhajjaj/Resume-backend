<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactSubmissionResource;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail; // If sending email notifications
use App\Mail\NewContactSubmission; // Your Mailable

class ContactSubmissionController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $submission = ContactSubmission::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            // 'is_read' defaults to false
        ]);

        // Optional: Send email notification to admin
         try {
             Mail::to(config('mail.admin_address', 'youradmin@example.com')) // Set admin address in .env or config
                 ->send(new NewContactSubmission($submission));
         } catch (\Exception $e) {
        //     // Log error, but don't fail the user's submission
           Log::error('Failed to send contact submission email: ' . $e->getMessage());
         }

        return new ContactSubmissionResource($submission);
    }
}