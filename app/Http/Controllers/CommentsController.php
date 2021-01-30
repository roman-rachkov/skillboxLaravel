<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\News;
use App\Models\Post;

class CommentsController extends Controller
{
    public function store(CommentRequest $request)
    {
        $attributes = $request->validated();
        $attributes['user_id'] = \Auth::user()->id;
        $commentable = $attributes['type'] == 'post' ? Post::find($attributes['id']) : News::find($attributes['id']);

        $commentable->comments()->create($attributes);

        flash('Комментарий успешно добавлен');
        return back();

    }
}
