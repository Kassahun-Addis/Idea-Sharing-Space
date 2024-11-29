<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'body' => $validated['body'],
            'author' => 'Anonymous', // Replace with auth()->user()->name when authentication is implemented
        ]);

        return back()->with('success', 'Comment added successfully!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comment deleted successfully!');
    }
}
