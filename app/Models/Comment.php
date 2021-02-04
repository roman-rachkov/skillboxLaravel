<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'user_id'];

//    public function news()
//    {
//        return $this->morphedByMany(News::class, 'commentable');
//    }
//
//    public function posts()
//    {
//        return $this->morphedByMany(Post::class, 'commentable');
//    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
