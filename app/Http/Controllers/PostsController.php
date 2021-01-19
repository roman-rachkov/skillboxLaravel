<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Rules\English;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostsController extends Controller
{
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
        if (!\Gate::allows('create-post')) {
            return redirect(route('user.login'));
        }
        return view('post.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        if (!\Gate::allows('create-post')) {
            return redirect(route('user.login'));
        }

        $post = \Auth::user()->posts()->create($request->validated());
        $tags = collect(explode(',', $request->get('tags')))->keyBy(fn($item) => $item);
        foreach ($tags as $tag){
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $post->tags()->attach($tag);
        }
        return redirect(route('posts.show', ['post' => $post->slug]));
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
        if(!\Gate::allows('update-post', $post)){
            abort(403);
        }
        return view('post.form', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if(!\Gate::allows('update-post', $post)){
            abort(403);
        }
        $validator = Validator::make($request->all(), [
            'slug' => [
                'required',
                Rule::unique('posts')->ignore($post->id),
                'max:150',
                new English
            ],
            'name' => 'required|max:100|min:5',
            'shortDesc' => 'required|max:250',
            'longDesc' => 'required',
            'published' => '',
            'tags' => ''
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $attributes = $request->all();
        $post->update($attributes);

        $postTags = $post->tags->keyBy('name');

        $tags = collect(explode(',', $attributes['tags']))->keyBy(fn($item) => $item);
        $ids = $postTags->intersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($postTags);
        foreach ($tagsToAttach as $tag){
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $ids[] = $tag->id;
        }
        $post->tags()->sync($ids);

        return redirect(route('posts.show', ['post'=> $post->slug]));
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
        if(\Gate::denies('delete-post', $post)){
            abort(403);
        }
        $post->delete();
        return redirect(route('main'));
    }
}
