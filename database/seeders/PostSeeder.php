<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all()->pluck('id')->toArray();

        Post::factory(rand(10, 30))
            ->create(['user_id' => 1])
            ->each(function (Post $post) use ($tags) {
                $randomTagsIds = Arr::random($tags, rand(1, 5));
                $post->tags()->sync($randomTagsIds);

            });
        Post::factory(rand(10, 30))
            ->create(['user_id' => 2])
            ->each(function (Post $post) use ($tags) {
                $randomTagsIds = Arr::random($tags, rand(1, 5));
                $post->tags()->sync($randomTagsIds);

            });
        Post::factory(rand(10, 30))
            ->create(['user_id' => 3])
            ->each(function (Post $post) use ($tags) {
                $randomTagsIds = Arr::random($tags, rand(1, 5));
                $post->tags()->sync($randomTagsIds);

            });
    }
}
