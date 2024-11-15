<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\PostController;

// Welcome route
Route::get('/', function () {
    return view('welcome'); // Ensure 'welcome.blade.php' exists in resources/views
});

// Resource routes for posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index'); // Display all posts
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create'); // Show form to create a new post
Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // Store a new post
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show'); // Display a specific post
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit'); // Show form to edit a specific post
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update'); // Update a specific post
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update'); // Update a specific post (PATCH)
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy'); // Delete a specific post

// Comment routes
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('comments/create/{post}', [CommentController::class, 'create'])->name('comments.create');

// Reply routes
Route::post('comments/{comment}/replies', [ReplyController::class, 'store'])->name('replies.store');
Route::get('replies/create/{comment}', [ReplyController::class, 'create'])->name('replies.create');

Route::get('/', function () {
    return view('welcome'); // Ensure 'welcome.blade.php' exists in resources/views
});