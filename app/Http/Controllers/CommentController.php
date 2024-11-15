<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
{
    $request->validate(['body' => 'required']);
    Comment::create([
        'post_id' => $postId,
        'author' => 'Anonymous', // Replace with actual user data
        'body' => $request->body,
    ]);
    return redirect()->route('posts.index');
}
}
