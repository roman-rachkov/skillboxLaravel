<?php


namespace App\Services;


use App\Helpers\ICommentable;
use Illuminate\Foundation\Http\FormRequest;

class CommentsService
{
    public function store(FormRequest $request, ICommentable $commentable): void
    {
        $attributes = $request->validated();
        $attributes['user_id'] = \Auth::user()->id;

        $commentable->comments()->create($attributes);

        flash('Комментарий успешно добавлен');

    }
}
