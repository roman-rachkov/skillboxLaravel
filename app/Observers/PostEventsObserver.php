<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\User;
use App\Notifications\PostCreatedNotification;
use App\Notifications\PostDeletedNotification;
use App\Notifications\PostUpdatedNotification;
use App\Services\PushAllService;

class PostEventsObserver
{
    protected string $adminEmail;

    public function __construct()
    {
        $this->adminEmail = config('skillbox.admin_email', '');
    }

    /**
     * Handle the Post "created" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function created(Post $post)
    {
        User::where('email', $this->adminEmail)->first()->notify(new PostCreatedNotification($post));
        flash('Статья "' . $post->title . '" успешно создна.');
        app(PushAllService::class)
            ->sendMessage('Новая статья: ' . $post->title, url: route('posts.show', ['post' => $post]))
            ->getBody();
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function updated(Post $post)
    {
        User::where('email', $this->adminEmail)->first()->notify(new PostUpdatedNotification($post));
        flash('Статья "' . $post->title . '" успешно обновлена.');

    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function deleted(Post $post)
    {
        User::where('email', $this->adminEmail)->first()->notify(new PostDeletedNotification($post));
        flash('Статья "' . $post->title . '" успешно удалена.');
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
