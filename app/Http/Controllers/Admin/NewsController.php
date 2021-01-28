<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Services\TagsService;
use Illuminate\Http\Request;

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
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $attributes = $request->validated();
        $post = \Auth::user()->posts()->create($attributes);
        if (!empty($attributes['tags'])) {
            app()->make(TagsService::class, ['post' => $post, 'tagsString' => $attributes['tags']])->addTags();
        }
        return redirect(route('posts.show', ['post' => $post]));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('post.edit')->with('post', $news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $attributes = $request->validated();
        $news->update($attributes);
        if (!empty($attributes['tags'])) {
            app()->make(TagsService::class, ['post' => $news, 'tagsString' => $attributes['tags']])->updateTags();
        }
        return redirect(route('posts.show', ['post' => $news]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect(route('main'));
    }
}
