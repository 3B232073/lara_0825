<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post; 

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'content',
    ];

    public function post()
    {
        // 多對一：每一則 comment 屬於一篇 post
        return $this->belongsTo(Post::class);
    }
}
