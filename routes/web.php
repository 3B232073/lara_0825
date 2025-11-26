<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;


Route::get('//save-post', function () {
    // 1. 先產生 Post 的物件
    $post = new Post();

    // 2. 指定欄位內容
    $post->title = 'test title';
    $post->content = 'test content';
    $post->is_feature = false;

    // 3. 儲存到資料庫
    $post->save();

    return "save() 已新增一筆資料！";
});

Route::get('//create-post', function () {
    Post::create([
        'title' => 'create title',
        'content' => 'create content',
        'is_feature' => false
    ]);

    return "create() 已新增一筆貼文！";
});