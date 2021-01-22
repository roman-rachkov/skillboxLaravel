<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
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

        Post::factory(rand(30, 90))
            ->state(new Sequence(
                ['user_id' => 1],
                ['user_id' => 2],
                ['user_id' => 3],
            ))
            ->create()
            ->each(function (Post $post) use ($tags) {
                $randomTagsIds = Arr::random($tags, rand(1, 5));
                $post->tags()->sync($randomTagsIds);

            });
    }
}
