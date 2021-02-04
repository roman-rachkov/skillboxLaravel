<?php

namespace App\Models;

use App\Helpers\ICommentable;
use App\Helpers\ITaggable;
use App\Helpers\TArticle;
use Illuminate\Database\Eloquent\Model;

class News extends Model implements ICommentable, ITaggable
{

    use TArticle;

    protected $fillable = ['slug', 'title', 'short_desc', 'long_desc', 'published'];
    protected $appends = [
        'type'
    ];

    public string $type = 'news';
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
