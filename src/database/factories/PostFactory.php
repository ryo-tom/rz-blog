<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence();

        return [
            'user_id'       => User::inRandomOrder()->first()->id,
            'category_id'   => Category::inRandomOrder()->first()->id,
            'title'         => $title,
            'slug'          => Str::slug($title),
            'content'       => $this->faker->paragraphs(20, true),
            'is_published'  => $this->faker->boolean,
            'published_at'  => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
