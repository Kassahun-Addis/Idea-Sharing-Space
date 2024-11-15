<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('comments.replies')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create'); // Ensure you have resources/views/posts/create.blade.php
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required', 'body' => 'required']);
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post')); // Show a single post
    }

    // public function edit(Post $post)
    // {
    //     return view('posts.edit', compact('post')); // Ensure you have this view
    // }

    // public function update(Request $request, Post $post)
    // {
    //     $request->validate(['title' => 'required', 'body' => 'required']);
    //     $post->update($request->all());
    //     return redirect()->route('posts.index');
    // }

    // public function destroy(Post $post)
    // {
    //     $post->delete();
    //     return redirect()->route('posts.index');
    // }
}
