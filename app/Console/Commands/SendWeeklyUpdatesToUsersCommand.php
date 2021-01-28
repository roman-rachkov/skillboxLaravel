<?php

namespace App\Console\Commands;

use App\Mail\WeeklyUpdatesMail;
use App\Models\News;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendWeeklyUpdatesToUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:updates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send to all user updates of week';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all(['email', 'name']);
        $posts = Post::all();
        $news = News::all(['slug', 'title', 'short_desc']);
        foreach ($users as $user){
            Mail::to($user->email)->send(new WeeklyUpdatesMail($user, $posts, $news));
        }
        return 0;
    }
}
