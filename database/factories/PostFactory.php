<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
        return [
            'user_id' => User::factory(),
            'category_id' => Category::all()->random()->id,
            'thumbnail' => fake()->imageUrl(640, 480, 'animals', true),
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'excert' => fake()->paragraph(5),
            'body' => fake()->paragraph(50),
        ];
    }
}
