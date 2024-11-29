<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with(['comments.replies', 'categories']);

        // Search functionality
        if ($request->search) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('body', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('categories', function($q) use ($searchTerm) {
                      $q->where('name', 'LIKE', "%{$searchTerm}%");
                  });
            });
        }

        // Category filter
        if ($request->category) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $posts = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::withCount('posts')->get();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'categories' => 'required|array|min:1'
        ]);

        $post = Post::create([
            'title' => $validated['title'],
            'body' => $validated['body']
        ]);

        $post->categories()->attach($validated['categories']);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show(Post $post)
    {
        $post->load('comments.replies');
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'categories' => 'required|array|min:1'
        ]);

        $post->update([
            'title' => $validated['title'],
            'body' => $validated['body']
        ]);

        $post->categories()->sync($validated['categories']);

        return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
