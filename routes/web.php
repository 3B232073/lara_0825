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

Route::get('//posts-find', function () {
    $post = Post::find(1); // 找 id=1 的貼文

    echo '標題：' . $post->title . '<br>';
    echo '內容：' . $post->content . '<br>';

    dd($post); // dump 出該筆貼文
});

Route::get('/posts-all', function () {
    $posts = Post::all();  // 取出所有貼文

    foreach ($posts as $post) {
        echo '編號：' . $post->id . '<br>';
        echo '標題：' . $post->title . '<br>';
        echo '內容：' . $post->content . '<br>';
        echo '張貼時間：' . $post->created_at . '<br>';
        echo '<hr>';
    }

    dd($posts); // 將所有資料結構 dump 出來
});

Route::get('//posts-condition', function () {
    $posts = Post::where('id', '<', 10)
                 ->orderBy('id', 'DESC')
                 ->get();

    dd($posts); // dump 出符合條件的所有貼文
});

Route::get('/update-post', function () {

    $post = Post::find(1);  // 找 id = 1 的那篇文章

    $post->update([
        'title' => 'updated title',
        'content' => 'updated content',
    ]);

    return "update() 已更新 id=1 的貼文！";
});

Route::get('/save-post', function () {

    $post = Post::find(1);  // 找 id = 1 的貼文

    $post->title = 'saved title';
    $post->content = 'saved content';

    $post->save();  // 儲存更新

    return "save() 已更新 id=1 的貼文！";
});