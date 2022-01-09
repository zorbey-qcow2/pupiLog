<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]);

        Post::create($attributes);

        return redirect('/');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();
        return request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'published_at' => $post->exists ? [] : []
        ]);
    }

    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post]);
    }

    public function update(Post $post)
    {

        $attributes = $this->validatePost($post);

//        if (isset($attributes['thumbnail'])) {
//            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
//        }

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function delete(Post $post)
    {

        if ($post->thumbnail != 'thumbnails/illustration-1.jpg') {
            $postThumbnail = $post->thumbnail;
        } else {
            $postThumbnail = null;
        }

        if (Storage::exists($postThumbnail)) {
            Storage::delete($postThumbnail);
        }

        $post->delete();
        return back()->with('success', 'Post Deleted!');
    }

    public function publishStatus(Post $post)
    {
        $post->update(['published' => !$post->published]);
        return back()->with('success', 'Post Status Updated!');
    }

}
