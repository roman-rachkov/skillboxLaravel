<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        return view('index', ['posts' => $tag->posts()->with('tags')->latest()->paginate()]);
    }
}
