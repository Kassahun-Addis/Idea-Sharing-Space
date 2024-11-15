<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function store(Request $request, $commentId)
    {
        $request->validate(['body' => 'required']);
        Reply::create([
            'comment_id' => $commentId,
            'author' => 'Anonymous', // Replace with actual user data
            'body' => $request->body,
        ]);
        return redirect()->back();
    }
}
