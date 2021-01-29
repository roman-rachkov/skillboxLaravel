<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = News::with('tags')->with('user')->published()->latest()->paginate();
        $title = 'Новости';
        return view('index', compact('posts', 'title'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('post.show')->with('post', $news);

    }
}
