<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Comment;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'body' => 'required'
        ]);

        $comment->replies()->create([
            'body' => $validated['body'],
            'author' => 'Anonymous', // Replace with auth()->user()->name when authentication is implemented
        ]);

        return back()->with('success', 'Reply added successfully!');
    }

    public function destroy(Reply $reply)
    {
        $reply->delete();
        return back()->with('success', 'Reply deleted successfully!');
    }
}
