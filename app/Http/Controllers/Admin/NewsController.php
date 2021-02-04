<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use \App\Http\Controllers\Controller;
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
        $posts = News::with('tags')->with('user')->latest()->paginate();
        return view('admin.news.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
        $post = \Auth::user()->news()->create($attributes);
        if (!empty($attributes['tags'])) {
            app(TagsService::class)->setTaggable($post)->setTags($attributes['tags'])->addTags();
        }
        return redirect(route('news.show', ['news' => $post]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit')->with('news', $news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $news)
    {
        $attributes = $request->validated();
        $news->update($attributes);
        if (!empty($attributes['tags'])) {
            app(TagsService::class)->setTaggable($news)->setTags($attributes['tags'])->updateTags();
        }

        flash('Новость обновлена');
        return back();
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
