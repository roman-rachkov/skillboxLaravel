<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends AbstaractArticle
{

    protected $fillable=['slug', 'title', 'short_desc', 'long_desc'];

    public string $type = 'news';

}
