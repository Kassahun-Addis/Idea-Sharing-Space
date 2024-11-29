{{-- resources/views/posts/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
    <!-- Content Header -->
    <div class="content-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="h3 mb-0">Latest Posts</h2>
                <p class="text-muted mb-0">Discover the latest thoughts and ideas</p>
            </div>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>New Post
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show glass-effect" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Posts Grid -->
    <div class="posts-grid">
        @foreach ($posts as $post)
            <div class="card post-card fade-in" style="animation-delay: {{ $loop->iteration * 0.1 }}s">
                <div class="card-body d-flex flex-column">
                    <!-- Post Header -->
                    <div class="post-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="h5 mb-0">{{ $post->title }}</h3>
                            <div class="dropdown">
                                <button class="btn btn-link p-0" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a href="{{ route('posts.edit', $post) }}" class="dropdown-item">
                                            <i class="fas fa-edit me-2"></i>Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger" 
                                                    onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash-alt me-2"></i>Delete
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Post Content -->
                    <div class="post-content">
                        <p class="text-muted mb-0">{{ Str::limit($post->body, 150) }}</p>
                    </div>

                    <!-- Post Footer -->
                    <div class="post-footer">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-link px-0 text-primary">
                                Read More <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-comments text-muted me-1"></i>
                                <small class="text-muted">{{ $post->comments->count() }}</small>
                            </div>
                        </div>
                    </div>

                    <!-- Post Categories -->
                    <div class="post-categories mb-3">
                        @foreach($post->categories as $category)
                            <span class="badge bg-primary">
                                <i class="{{ $category->icon }} me-1"></i>
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links() }}
    </div>
@endsection