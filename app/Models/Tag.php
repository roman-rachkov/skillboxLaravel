<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    use HasFactory;

    public function getRouteKeyName()
    {
        return 'name';
    }

    protected $fillable = ['name'];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function news()
    {
        return $this->morphedByMany(News::class, 'taggable');
    }

    public function morphed(){
        return $this->posts->union($this->news);
    }

    public static function tagsCloud()
    {
        return self::has('news')->orHas('posts')->get();
    }

}
