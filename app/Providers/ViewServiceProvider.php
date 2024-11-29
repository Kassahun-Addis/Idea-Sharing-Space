<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Post;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer('layouts.app', function ($view) {
            $view->with([
                'totalPosts' => Post::count(),
                'totalComments' => \App\Models\Comment::count(),
                'totalReplies' => \App\Models\Reply::count(),
                'categories' => Category::withCount('posts')->get(),
            ]);
        });
    }
} 