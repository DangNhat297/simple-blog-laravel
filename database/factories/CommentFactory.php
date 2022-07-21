<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Comment::class;
    public function definition()
    {
        return [
            'name'      => $this->faker->name(),
            'content'   => $this->faker->realText(20),
            'post_id'   => $this->faker->randomElement(Post::pluck('id'))
        ];
    }
}
