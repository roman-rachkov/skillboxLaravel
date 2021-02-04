<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Post;
use App\Models\User;
use DB;

class StatisticsController extends Controller
{
    public function index()
    {
        $stats['totalPosts'] = Post::count();
        $stats['totalNews'] = News::count();
        $stats['userWithMostPosts'] = User::withCount('posts')->orderByDesc('posts_count')->first();
        $stats['userWithMostComments'] = User::withCount('comments')->orderByDesc('comments_count')->first();
        $stats['longestPost'] = Post::select('title', 'slug')
            ->where(\DB::raw('LENGTH(long_desc)'), "=", \DB::raw('(SELECT max(LENGTH(long_desc)) FROM posts)'))
            ->first();
        $stats['shortestPost'] = Post::where(\DB::raw('LENGTH(long_desc)'), "=", \DB::raw('(SELECT min(LENGTH(long_desc)) FROM posts)'))
            ->first();

        $active = User::has('posts', '>', '1')->withCount('posts');
        $stats['avgPosts'] = floor(DB::table(DB::raw("({$active->toSql()}) as active"))->avg('posts_count'));

        $stats['mostChangeablePosts'] = Post::whereHas('history')->withCount('history')->orderByDesc('history_count')->first();
        $stats['mostCommentablePost'] = Post::whereHas('comments')->orderByDesc('comments_count')->withCount('comments')->first();

        return view('statistics.index')->with('stats',  $stats);
    }
}
