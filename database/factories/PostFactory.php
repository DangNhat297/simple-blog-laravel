<?php

namespace Database\Factories;
use Illuminate\Support\Str;
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
    public function definition()
    {
        $title = $this->faker->sentence;
        return [
            'title'     => $title,
            'slug'      => Str::slug($title),
            'thumbnail' => $this->faker->imageUrl($width = 1000, $height = 480),
            'short_desc'=> $this->faker->text($maxNbChars = 200),
            'content'   => $this->faker->paragraphs($nb = 10, $asText = true),
            'published' => 1,
            'publishedAt'=> now(),
            'author_id' => 1
        ];
    }
}
