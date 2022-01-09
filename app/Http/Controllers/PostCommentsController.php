<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{

    public function store(Post $post)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->create(
            ['user_id' => request()->user()->id,
                'body' => request('body')
            ]);

        return back();
    }

    public function subCommentView(Post $post, Comment $comment)
    {
        return view('components.comment.comtocom', compact('post', 'comment'));
    }

    public function subCommentStore(Post $post, Comment $comment, Request $request)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $comment->comtocoms()->create(
            [
                'user_id' => request()->user()->id,
                'post_id' => $post->id,
                'comment_id' => $comment->id,
                'body' => request('body')
            ]);
        
//        $testy = new Comtocom();
//        $testy->user_id = request()->user()->id;
//        $testy->post_id = $post->id;
//        $testy->comment_id = $comment->id;
//        $testy->body = request('body');
//        $testy->save();

        $uriRota = "/posts/" . $post->slug;
        return redirect($uriRota)->with('success', 'Yorumunuz işleme alındı.');
    }

}
