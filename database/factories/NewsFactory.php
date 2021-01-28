<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->word,
            'short_desc' => $this->faker->text(255),
            'long_desc' => $this->faker->text(800),
            'published' => $this->faker->boolean(70),
            'created_at' => Carbon::now()->subDays(rand(0, 365)),
            'user_id' => User::factory()
        ];
    }
}
