<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $category = \App\Models\Category::factory(10)->create();

        // \App\Models\Post::factory(20)->create();

        // $category = Category::all();
        
        // \App\Models\Post::all()->each(function($post) use ($category){
        //     $post->categories()->attach(
        //         $category->random(rand(1, 3))->pluck('id')->toArray()
        //     );
        // });


    }
}
