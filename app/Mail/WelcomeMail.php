<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $respondData;
    public function __construct()
    {
        $this->respondData = [];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->respondData = [
            'userInfo' => User::latest()->get()
        ];

        // dd($this->respondData);
        return $this->view('mail.welcome', $this->respondData);
    }
}
