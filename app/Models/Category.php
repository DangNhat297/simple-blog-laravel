<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'parent_id',
        'published'
    ];

    public function childs(){
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function posts(){
        return $this->belongsToMany(Post::class, 'post_categories', 'category_id', 'post_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($cat) {
             $cat->childs()->delete();
        });
    }
}
