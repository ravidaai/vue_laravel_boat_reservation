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
    public function __construct()
    {
        //$this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $subject = 'test';//$this->data['subject'];
        $to = 'codewithravi@gmail.com';//$this->data['to_email'];
        $from    = 'ravidaai@gmail.com';//$this->data['from_email'];
        $from_name    = 'Boat Registration USA';

        
        return $this
        ->view('emails.reservation')
        ->subject($subject)
        ->from($from, $from_name)
        ->to([$to])
        ->sendgrid([
            'personalizations' => [
                [
                    'substitutions' => [
                        ':myname' => $from_name,
                    ],
                ],
            ],
        ]);
    }
}
