<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all()->pluck('id')->toArray();

        News::factory(rand(10, 30))
            ->create(new Sequence(
                ['user_id' => 1],
            ))
            ->each(function (News $post) use ($tags) {
                $randomTagsIds = Arr::random($tags, rand(1, 5));
                $post->tags()->sync($randomTagsIds);

            });
    }
}
