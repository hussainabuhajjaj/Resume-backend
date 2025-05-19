<?php

namespace App\Mail;

use App\Models\ContactSubmission; // Import your model
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContactSubmission extends Mailable implements ShouldQueue // Optional: implement ShouldQueue for background sending
{
    use Queueable, SerializesModels;

    public ContactSubmission $submission; // Public property to hold the submission data

    /**
     * Create a new message instance.
     */
    public function __construct(ContactSubmission $submission)
    {
        $this->submission = $submission;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Contact Form Submission: ' . ($this->submission->subject ?? 'No Subject'),
            replyTo: [$this->submission->email => $this->submission->name] // Set reply-to for easy response
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact.submission', // Path to your Markdown email view
            with: [ // Data to pass to the view
                'name' => $this->submission->name,
                'emailAddress' => $this->submission->email, // Renamed to avoid conflict with Mailable's $email
                'mailSubject' => $this->submission->subject, // Renamed
                'messageContent' => $this->submission->message, // Renamed
                'submissionDate' => $this->submission->created_at->format('Y-m-d H:i:s'),
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}