{{-- resources/views/posts/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
    <!-- Content Header -->
    <div class="content-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="h3 mb-0">
                    @if(request('search'))
                        Search Results for "{{ request('search') }}"
                    @elseif(request('category'))
                        {{ ucfirst(request('category')) }} Posts
                    @else
                        Latest Posts
                    @endif
                </h2>
                <p class="text-muted mb-0">
                    @if(request('search'))
                        Found {{ $posts->total() }} {{ Str::plural('result', $posts->total()) }}
                    @elseif(request('category'))
                        Showing posts in {{ request('category') }} category
                    @else
                        Discover the latest thoughts and ideas
                    @endif
                </p>
            </div>
            <div class="d-flex gap-2">
                @if(request('search') || request('category'))
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i>Clear Filters
                    </a>
                @endif
                <a href="{{ route('posts.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i>New Post
                </a>
            </div>
        </div>
    </div>

    <!-- Add this after the content header if no posts are found -->
    @if($posts->isEmpty())
        <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i>
            @if(request('search'))
                No posts found matching "{{ request('search') }}". Try different keywords or <a href="{{ route('posts.index') }}">view all posts</a>.
            @elseif(request('category'))
                No posts found in this category. <a href="{{ route('posts.index') }}">View all posts</a>.
            @else
                No posts found.
            @endif
        </div>
    @endif

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
                    <div class="post-date">
                        <small class="text-muted">
                            {{ $post->created_at ? $post->created_at->diffForHumans() : 'No date available' }}
                        </small>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end" style="display: flex; flex-direction: row; gap: 1rem; margin-top: 1rem;">
                        <li>
                            <a href="{{ route('posts.edit', $post) }}" class="dropdown-item">
                                <i class="fas fa-edit me-2"></i>Edit
                            </a>
                        </li>
                        <li style="margin-top: 0.25rem;">
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
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $posts->appends(request()->query())->links() }}
    </div>
@endsection

<style>
    .alert-info {
        background: rgba(99, 102, 241, 0.1);
        border: none;
        color: #6366f1;
        padding: 1rem;
        border-radius: 12px;
        margin: 1rem 0;
    }

    .badge {
        font-weight: 500;
        padding: 0.5em 0.75em;
    }

    .alert-info a {
        color: inherit;
        text-decoration: underline;
    }

    .alert-info a:hover {
        text-decoration: none;
    }

    .btn-outline-secondary {
        border: 2px solid #e5e7eb;
        color: #4b5563;
    }

    .btn-outline-secondary:hover {
        background: #f3f4f6;
        border-color: #d1d5db;
        color: #374151;
    }
</style>