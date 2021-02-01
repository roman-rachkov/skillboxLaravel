<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends AbstaractArticle
{
    public string $type = 'post';

    protected static function boot()
    {
        parent::boot();

        static::updating(function (Post $post){
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
