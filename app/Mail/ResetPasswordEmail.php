<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $user_id;
    protected $username;
    protected $email;
    protected $name;
    protected $token;

    /**
     * Create a new message instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->user_id = $data['user_id'];
        $this->username = $data['username'];
        $this->email = $data['email'];
        $this->name = $data['name'];
        $this->token = $data['token'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.resetPassword')
            ->subject('重設密碼')
            ->with([
                'user_id' => $this->user_id,
                'username' => $this->username,
                'email' => $this->email,
                'name' => $this->name,
                'token' => $this->token,
            ]);
    }
}
