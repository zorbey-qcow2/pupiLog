<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class AdminCommentController extends Controller
{
    public function list()
    {
        $comments = Comment::all();
        return view('admin.posts.comments.list', compact('comments'));
    }

    public function showCommentAdmin(Post $post, Comment $comment)
    {
        return view('admin.posts.comments.read', compact('post', 'comment'));
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comment Deleted!');
    }

    public function publishStatus(Comment $comment)
    {
        $comment->update(['published' => !$comment->published]);
        return back()->with('success', 'Comment Status Updated!');
    }

    public function edit(Post $post, Comment $comment)
    {
        return view('admin.posts.comments.edit', [
            'comment' => $comment
        ]);
    }

    public function update(Comment $comment)
    {
        $attributes = $this->validateComment($comment);

        $userId = User::where('username', $attributes['username'])->get('id')->toArray()[0]['id'];
        

        $comment->update([
            'body' => $attributes['body'],
            'created_at' => $attributes['created_at']
        ]);
        $comment->update([
            'user_id' => $userId
        ]);

        return back()->with('success', 'Comment Updated!');

    }

    protected function validateComment(Comment $comment)
    {
        return request()->validate([
            'username' => 'required',
            'body' => 'required',
            'created_at' => 'required'
        ]);
    }

}
