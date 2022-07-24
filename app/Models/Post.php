<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'post_text',
        'post_image',
        'post_url',
        'user_id',
        'community_id',
    ];

}
