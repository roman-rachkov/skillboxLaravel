<?php

namespace App\Services;

use App\Helpers\ITaggable;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsService
{

    private Collection $tags;
    private ITaggable $taggable;

    /**
     * Устанавливает модель для которого нужно обновить теги
     * @param ITaggable $taggable
     * @return $this
     */
    public function setTaggable(ITaggable $taggable)
    {
        $this->taggable = $taggable;
        return $this;
    }

    /**
     * Преаброзует строку тегов в колекуцию и устанавливает в соответвующее поле
     * @param string $tagsString
     * @return $this
     */
    public function setTags(string $tagsString = "")
    {
        $this->tags = collect(explode(',', $tagsString))->keyBy(fn($item) => $item);
        return $this;
    }

    /**
     * Обновляет список привязаных тегов
     * @return void
     */
    public function updateTags()
    {
        $oldTags = $this->taggable->tags->keyBy('name');
        $ids = $oldTags->intersectByKeys($this->tags)->pluck('id')->toArray();
        $tagsToAttach = $this->tags->diffKeys($oldTags);
        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $ids[] = $tag->id;
        }
        $this->taggable->tags()->sync($ids);
    }

    /**
     * Прявязывает теги к статье
     * @return void
     */
    public function addTags()
    {
        foreach ($this->tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $this->taggable->tags()->attach($tag);
        }
    }


}
