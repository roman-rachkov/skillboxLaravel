<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsService
{

    private Collection $tags;
    private Post $post;

    public function __construct(Post $post,  $tagsString = '')
    {
        $this->tags = collect(explode(',', $tagsString))->keyBy(fn($item) => $item);
        $this->post = $post;
    }

    /**
     * Обновляет список привязаных тегов
     * @return void
     */
    public function updateTags()
    {
        $postTags = $this->post->tags->keyBy('name');
        $ids = $postTags->intersectByKeys($this->tags)->pluck('id')->toArray();
        $tagsToAttach = $this->tags->diffKeys($postTags);
        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $ids[] = $tag->id;
        }
        $this->post->tags()->sync($ids);
    }

    /**
     * Прявязывает теги к статье
     * @return void
     */
    public function addTags()
    {
        foreach ($this->tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $this->post->tags()->attach($tag);
        }
    }


}
