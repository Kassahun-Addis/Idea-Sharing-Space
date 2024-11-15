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
    
    public function store(Request $request)
    {
        $request->validate(['title' => 'required', 'body' => 'required']);
        Post::create($request->all());
        return redirect()->route('posts.index');
    }


}
