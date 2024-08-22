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
    public $task,$assignerName;

    /**
     * Create a new message instance.
     */
    public function __construct(  $task,$assignerName)
    {
        //
        $this->task =$task;
        $this->assignerName =$assignerName;
    }

    /**
     * Get the message envelope.
     */

   
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'MainStreamMedia',
            // from: new Address('test@gmail.dev',' Test Mail')
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.notification',
            with: [
                'taskName' => $this->task->task_name,
                'description' => $this->task->description,
                'startDate' => $this->task->start_date,
                'dueDate' => $this->task->due_date,
                'assignerName' => $this->assignerName,
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
