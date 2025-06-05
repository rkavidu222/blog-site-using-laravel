<?php

namespace App\Models;
use App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    // Allow mass assignment on these fields
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'featured',
        'slug',
        'user_id'
    ];

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }




    protected $dates = ['deleted_at'];

    // Relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(){

        return $this->belongsToMany('App\Models\Tag');

    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
