<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function getRouteKeyName()
    {
        return 'name';
    }

    protected $fillable = ['name'];
    use HasFactory;

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public static function tagsCloud(){
        return self::has('posts')->get();
    }

}
