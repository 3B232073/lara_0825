<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;


Route::get('//save-post', function () {

    $post = new Post();

    $post->title = 'test title';
    $post->content = 'test content';
    $post->is_feature = false;

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
    $post = Post::find(1);

    echo '標題：' . $post->title . '<br>';
    echo '內容：' . $post->content . '<br>';

    dd($post);
});

Route::get('/posts-all', function () {
    $posts = Post::all();

    foreach ($posts as $post) {
        echo '編號：' . $post->id . '<br>';
        echo '標題：' . $post->title . '<br>';
        echo '內容：' . $post->content . '<br>';
        echo '張貼時間：' . $post->created_at . '<br>';
        echo '<hr>';
    }

    dd($posts);
});

Route::get('//posts-condition', function () {
    $posts = Post::where('id', '<', 10)
                 ->orderBy('id', 'DESC')
                 ->get();

    dd($posts);
});

Route::get('/update-post', function () {

    $post = Post::find(1);

    $post->update([
        'title' => 'updated title',
        'content' => 'updated content',
    ]);

    return "update() 已更新 id=1 的貼文！";
});

Route::get('/save-post', function () {

    $post = Post::find(1);

    $post->title = 'saved title';
    $post->content = 'saved content';

    $post->save();

    return "save() 已更新 id=1 的貼文！";
});

Route::get('/delete-post', function () {

    $post = Post::find(1);
    if ($post) {
        $post->delete();
        return "delete() 已刪除 id = 1 的貼文";
    }

    return "找不到 id = 1 的貼文";
});

Route::get('/destroy-post', function () {

    Post::destroy(2);

    return "destroy() 已刪除 id = 2 的貼文";
});

Route::get('/destroy-multi', function () {

    Post::destroy([3, 5, 7]);

    return "destroy() 已刪除 id = 3,5,7 的貼文";
});

Route::get('/posts-collection-all', function () {
    $allPosts = Post::all();
    dd($allPosts);
});

Route::get('/posts-featured', function () {
    $featuredPosts = Post::where('is_feature', 1)->get();
    dd($featuredPosts);
});

Route::get('/posts-single-find', function () {
    $fourthPost = Post::find(4);
    dd($fourthPost);
});

Route::get('/posts-single-first', function () {
    $lastPost = Post::orderBy('id', 'DESC')->first();
    dd($lastPost);
});

Route::get('/post-with-comments', function () {

    $post = Post::find(6);

    echo '標題：'.$post->title.'<br>';
    echo '內容：'.$post->content.'<br><hr>';

    $comments = $post->comments;

    foreach ($comments as $comment) {
        echo '留言：' . $comment->content . '<br>';
    }

    dd($comments);
});