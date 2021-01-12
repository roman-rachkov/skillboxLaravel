<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'name', 'shortDesc', 'longDesc', 'published'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query){
        return $query->where('published', true);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

}
