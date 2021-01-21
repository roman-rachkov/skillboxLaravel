<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsService
{

    private Collection $tags;
    private Post $post;

    public function __construct(Post $post, string $tagsString)
    {
        $this->setTags($tagsString);
        $this->setPost($post);
    }

    /**
     * Устанавливает пост для которого нужно обновить теги
     * @param Post $post
     * @return $this
     */
    public function setPost(Post $post){
        $this->post = $post;
        return $this;
    }

    /**
     * Преаброзует строку тегов в колекуцию и устанавливает в соответвующее поле
     * @param string $tagsString
     * @return $this
     */
    public function setTags(string $tagsString = ""){
        $this->tags = collect(explode(',', $tagsString))->keyBy(fn($item) => $item);
        return $this;
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
