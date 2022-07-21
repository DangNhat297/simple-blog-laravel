<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;
    public function definition()
    {
        $title = $this->faker->sentence($nbWords = 4, $variableNbWords = true);
        $slug = Str::slug($title, '-');
        // $filepath = public_path('storage/images');
        // if(!File::exists($filepath)){
        //     File::makeDirectory($filepath);
        // }
        return [
            'name'      => $title,
            'slug'      => $slug,
            'published' => 1,
            'image'     => $this->faker->imageUrl($width = 640, $height = 480),
            'parent_id' => 0
        ];
    }
}
