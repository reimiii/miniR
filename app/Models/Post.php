<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'post_text',
        'post_image',
        'post_url',
        'user_id',
        'votes',
        'community_id',
    ];

    public function community(): BelongsTo
    {
        return $this->belongsTo(Community::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

}
