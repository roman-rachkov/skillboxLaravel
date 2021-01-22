<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\TagsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('tags')->with('user')->published()->latest()->paginate();
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
     * @param PostRequest $request
     * @param TagsService $tagsService
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
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
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        Gate::authorize('update', $post);
        return view('post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @param TagsService $tagsService
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(PostRequest $request, Post $post)
    {
        Gate::authorize('update', $post);
        $attributes = $request->validated();
        $post->update($attributes);
        if (!empty($attributes['tags'])) {
            app()->make(TagsService::class, ['post' => $post, 'tagsString' => $attributes['tags']])->updateTags();
        }
        return redirect(route('posts.show', ['post' => $post]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        $post->delete();
        return redirect(route('main'));
    }
}
