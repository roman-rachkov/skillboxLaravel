<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\PostsController as MainPostsController;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends MainPostsController
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($request->has('slug')) {
            $postRequest = app(PostRequest::class)->replace($request->all());
            return parent::update($postRequest, $post);
        }
        $post->published = $request->has('published');
        $post->save();
        flash('Состояние публикации изменено');
        return back();
    }

}
