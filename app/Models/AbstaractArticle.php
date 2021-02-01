<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class AbstaractArticle extends Model
{
    use HasFactory;

    protected string $type = 'post';

    protected $fillable = ['slug', 'title', 'short_desc', 'long_desc', 'published'];
    protected $appends = [
        'type'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

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
        return $this->morphToMany(Comment::class, 'commentable');
    }

}
