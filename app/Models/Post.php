<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'is_feature',
    ];
    
    public function comments()
    {
        // 1 對多：一篇 post 有很多 comments
        return $this->hasMany(Comment::class);
    }
}
