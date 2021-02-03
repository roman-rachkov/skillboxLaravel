<?php

namespace App\Helpers;

use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

trait TArticle
{
    use HasFactory;

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTypeAttribute()
    {
        return $this->type;
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
