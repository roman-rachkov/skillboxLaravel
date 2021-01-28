<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WeeklyUpdatesMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public $posts;
    public $news;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $posts, $news)
    {
        $this->user = $user;
        $this->posts = $posts;
        $this->news = $news;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.weekly-updates');
    }
}
