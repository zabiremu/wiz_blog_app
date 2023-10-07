<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    protected $model = Post::class;
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'details' => fake()->paragraph(),
            'category_id'=> fake()->numberBetween(1,10),
            'user_id'=> 1,
            'status'=> fake()->numberBetween(0,1)
        ];
    }
}
