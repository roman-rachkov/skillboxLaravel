<?php

namespace App\Models;

use App\Helpers\ICommentable;
use App\Helpers\ITaggable;
use App\Helpers\TArticle;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements ICommentable, ITaggable
{
    use TArticle;

    protected $fillable = ['slug', 'title', 'short_desc', 'long_desc', 'published'];
    protected $appends = [
        'type'
    ];

    public string $type = 'post';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function (Post $post) {
            $after = $post->getDirty();
            $post->history()->attach(\Auth::user()->id, [
                'before' => json_encode(\Arr::only($post->fresh()->toArray(), array_keys($after))),
                'after' => json_encode($after),
            ]);
        });
    }


    public function history()
    {
        return $this->belongsToMany(User::class, 'post_histories')->withPivot(['before', 'after'])->withTimestamps();
    }
}
