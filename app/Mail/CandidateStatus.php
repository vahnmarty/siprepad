<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidateStatus extends Mailable
{
    use Queueable, SerializesModels;
    public $student,$status,$parentDetail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($student,$status,$parentDetail)
    {
        
        $this->student = $student;
        $this->status = $status;
        $this->parentDetail = $parentDetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'Candidate Feedback')
        ->view('emails.candidateStatusMail')
        ->with([
            'student' => $this->student,
            'status'  => $this->status,
            'parent'  => $this->parentDetail,
        ]);
    }
}
