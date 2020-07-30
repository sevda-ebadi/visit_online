<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMagicLink extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $token)
    {
        //
        $this->name = $name;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('magic', ['name'=>$this->name, 'link'=>$this->buildLink()]);
    }

    protected function buildLink()
    {
        return route('magic.login', [
            'token'=>$this->token
        ]);
    }
}
