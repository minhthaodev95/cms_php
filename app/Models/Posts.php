<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'author_id',
        'feature_image_id',
        'status',
        'slug',
        'published_at',
        'created_at',
        'updated_at',
        'deleted_at',
        'featured',
        'views',
        'likes',
        'dislikes',
        'comments'
    ];

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    
}
