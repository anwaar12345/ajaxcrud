<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class regismail extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        return $this->subject("Thanks For Sign Up")
        ->from(env('MAIL_USERNAME'), 'User Management App')
        ->view('emails.custom',compact('data'));
    }
}
