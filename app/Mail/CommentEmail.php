<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $user;

    public function __construct($title, $user)
    {
        $this->title = $title;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.comment')
        ->subject("Comentario Registrado");
    }
}
