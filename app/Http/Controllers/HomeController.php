<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index(){
        $categories = Category::with(['posts' => function($query){
            $query->where('published', 1);
        }])->where('published', 1)->limit(10)->get();
        $posts = Post::with(['categories' => function($query){
            $query->where('published', 1);
        }, 'author'])->where('published', 1)->paginate(4);
        $popularPosts = Post::where('published', 1)->orderBy('view')->limit(5)->get();
        return view('screen.home', compact('categories', 'posts', 'popularPosts'));
    }

}
