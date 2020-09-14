<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class RegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    use SendGrid;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.reservation')
                    ->replyTo($this->data['email'], $this->data['name'])
                    ->subject("Boat Registration");


        //return  $this->view('emails.reservation');
    }
}
