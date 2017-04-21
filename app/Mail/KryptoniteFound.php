<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class KryptoniteFound extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public function __construct()
    {
        //
    }

    public $total = 30;
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'vothihue2807@gmail.com';
        $name = 'HueMoc';
        $subject = 'Krytonite Found';
        return $this->view('email.kryptonite-found')
            ->from($address, $name)
            ->cc($address, $name)
            ->bcc($address, $name)
            ->replyTo($address, $name)
            ->subject($subject);

    }

}
