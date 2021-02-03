<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Post;
use Illuminate\Http\Request;

class UpdatePublishController extends Controller
{
    public function news(Request $request, News $news)
    {
        $news->published = $request->has('published');
        $news->save();
        flash('Состояние новости изменено');
        return back();
    }

    public function post(Request $request, Post $post)
    {
        $post->published = $request->has('published');
        $post->save();
        flash('Состояние поста изменено');
        return back();
    }
}
