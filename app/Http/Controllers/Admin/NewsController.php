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
            app()->make(TagsService::class, ['post' => $post, 'tagsString' => $attributes['tags']])->addTags();
        }
        return redirect(route('news.show', ['post' => $post]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit')->with('post', $news);
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
        if ($request->has('slug')) {
            $attributes = app(NewsRequest::class)->replace($request->all())->validated();
            $news->update($attributes);
            if (!empty($attributes['tags'])) {
                app()->make(TagsService::class, ['post' => $news, 'tagsString' => $attributes['tags']])->updateTags();
            }
        } else {
            $news->published = $request->has('published');
            $news->save();
        }
        flash('Состояние новости изменено');
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
