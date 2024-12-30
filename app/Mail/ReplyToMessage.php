<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplyToMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $response;

    /**
     * Create a new message instance.
     *
     * @param string $response
     * @return void
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Respuesta a tu mensaje')
                    ->view('emails.reply')
                    ->with(['response' => $this->response]);
    }
}