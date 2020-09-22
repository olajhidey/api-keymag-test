<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Str;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $user;

    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        
        
        $token = Str::random(20);
        $link = URL::temporarySignedRoute(
            'verify', now()->addMinutes(2), ['token' => $token, 'id'=> $this->user->id]
        );
        // $link = url("/verifyEmail/{$token}/{$this->user->id}");
        
        return $this
                ->from('info@devcoder.com.ng', 'Keymag Team')
                ->to($this->user->email)
                ->view('emails.welcome')
                ->subject('Welcome to KeyMag! Confirm your Email')
                ->with([
                    'link' => $link
                ]);
    }
}
