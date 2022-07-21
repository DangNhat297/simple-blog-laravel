<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon;
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_desc',
        'content',
        'thumbnail',
        'published',
        'publishedAt',
        'author_id'
    ];

    protected $appends = [
        'distanceDate',
        'next',
        'previous'
    ];

    public function categories(){
        return $this->belongsToMany(Category::class, 'post_categories', 'post_id', 'category_id');
    }

    public function author(){
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function getPreviousAttribute(){
        return $this->where('id', '<', $this->id)->orderBy('id','desc')->first();
    }

    public function getNextAttribute(){
        return $this->where('id', '>', $this->id)->orderBy('id','asc')->first();
    }

    public function getPublishedAtAttribute($date){
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y \l\ú\c H:i');
    }

    public function getDistanceDateAttribute(){
        return $this->getModel()->whereBetween('created_at', [now() , $this->createdAt])->get();
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
