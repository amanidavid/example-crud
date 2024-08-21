<?php

namespace App\Mail;
use App\Models\Work;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MainEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $task;

    /**
     * Create a new message instance.
     */
    public function __construct( Work $task)
    {
        //
        $this->task =$task;
    }

    /**
     * Get the message envelope.
     */

    //  public function build(){
       
    //     return $this->subject('New Task Assigned')
    //                 ->view('emails.notification'); 
    //  }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'MainStream',
            // from: new Address('test@gmail.dev',' Test Mail')
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.notification',
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
