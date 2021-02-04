<?php

namespace App\Http\Controllers;

use App\Helpers\iCommentable;
use App\Http\Requests\CommentRequest;
use App\Models\News;
use App\Models\Post;
use App\Services\CommentsService;

class CommentsController extends Controller
{
    public function news(CommentRequest $request, News $news, CommentsService $commentsService)
    {

        $commentsService->store($request, $news);
        return back();

    }

    public function post(CommentRequest $request, Post $post, CommentsService $commentsService)
    {
        $commentsService->store($request, $post);
        return back();
    }
}
