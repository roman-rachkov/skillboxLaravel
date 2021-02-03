<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(150);
        $slug = str_replace(' ', '_', $title);
        $slug = str_replace('.', '', $slug);
        return [
            'title' => $this->faker->sentence,
            'slug' => $slug,
            'short_desc' => $title,
            'long_desc' => $this->faker->text(800),
            'published' => $this->faker->boolean(70),
            'created_at' => Carbon::now()->subDays(rand(0, 365)),
            'user_id' => User::factory()
        ];
    }
}
