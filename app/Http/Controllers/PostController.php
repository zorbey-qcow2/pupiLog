<?php

namespace App\Http\Controllers;

use App\Models\Post;


class PostController extends Controller
{
    //çalışıyor ona göre

    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->where('published', true)->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->latest()->where('published', true)->paginate(5)->withQueryString();
        return view('posts.show', compact('comments', 'post'));

    }

}
