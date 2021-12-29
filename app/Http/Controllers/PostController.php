<?php

namespace App\Http\Controllers;

use App\Models\Post;


class PostController extends Controller
{
    //çalışıyor ona göre

    public function index()
    {

//        //* (1) - bu kısım eğer index un-logine kapatılacaksa aktif edilmeli */
//        if (auth()->user() && auth()->user()->agreed === 1) {
//            return view('posts.index', [
//                'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->where('published', true)->paginate(6)->withQueryString()
//            ]);
//        } elseif (auth()->user() && auth()->user()->agreed === 0) {
//            return redirect('hosgeldin');
//        } else {
//            return redirect('login');
//        }

        //* (1) - bu kısım eğer index un-logine'de açılacaksa aktif edilmeli */
        if (auth()->user() && auth()->user()->agreed === 1) {
            return view('posts.index', [
                'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->where('published', true)->paginate(6)->withQueryString()
            ]);
        } elseif (auth()->user() && auth()->user()->agreed === 0) {
            return redirect('hosgeldin');
        } else {
            return view('posts.index', [
                'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->where('published', true)->paginate(6)->withQueryString()
            ]);
        }

    }

    public function show(Post $post)
    {
        $comments = $post->comments()->latest()->where('published', true)->paginate(5)->withQueryString();
        return view('posts.show', compact('comments', 'post'));

    }

}
