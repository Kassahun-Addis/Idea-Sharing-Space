@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="content-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2 class="h3 mb-0">Edit Post</h2>
            <p class="text-muted mb-0">Update your post content</p>
        </div>
        <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left me-2"></i>Back to Post
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('posts.update', $post) }}" method="POST" class="post-form">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="form-label h6 mb-3">Post Title</label>
                <input type="text" 
                       name="title" 
                       id="title" 
                       class="form-control form-control-lg @error('title') is-invalid @enderror" 
                       value="{{ old('title', $post->title) }}"
                       required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="body" class="form-label h6 mb-3">Post Content</label>
                <textarea name="body" 
                          id="body" 
                          class="form-control @error('body') is-invalid @enderror" 
                          rows="8" 
                          required>{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label h6 mb-3">Categories</label>
                <div class="category-grid">
                    @foreach($categories as $category)
                        <div class="category-option">
                            <input type="checkbox" 
                                   class="btn-check" 
                                   name="categories[]" 
                                   id="category{{ $category->id }}" 
                                   value="{{ $category->id }}"
                                   {{ in_array($category->id, old('categories', $post->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <label class="btn btn-outline-category" for="category{{ $category->id }}">
                                <i class="{{ $category->icon }} me-2"></i>
                                {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('categories')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('posts.show', $post) }}" class="btn btn-light">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update Post
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Form Styles */
    .post-form .form-control {
        border: 2px solid #e5e7eb;
        padding: 1rem;
        font-size: 1rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        background-color: #f9fafb;
    }

    .post-form .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        background-color: #ffffff;
    }

    .post-form .form-control::placeholder {
        color: #9ca3af;
    }

    .post-form .form-control-lg {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .post-form textarea {
        resize: vertical;
        min-height: 200px;
    }

    .post-form label {
        color: #4b5563;
        font-weight: 500;
    }

    /* Button Styles */
    .btn-outline-primary {
        border: 2px solid #6366f1;
        color: #6366f1;
        font-weight: 600;
    }

    .btn-outline-primary:hover {
        background: var(--primary-gradient);
        border-color: transparent;
        color: white;
    }

    .btn-light {
        background-color: #f3f4f6;
        border: none;
        font-weight: 600;
    }

    .btn-light:hover {
        background-color: #e5e7eb;
    }

    /* Error States */
    .is-invalid {
        border-color: #ef4444 !important;
    }

    .invalid-feedback {
        font-size: 0.875rem;
        color: #ef4444;
        margin-top: 0.5rem;
    }

    .category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 1rem;
    }

    .btn-outline-category {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        color: #4b5563;
        transition: all 0.3s ease;
    }

    .btn-check:checked + .btn-outline-category {
        background: var(--primary-gradient);
        border-color: transparent;
        color: white;
    }

    .btn-outline-category:hover {
        border-color: #6366f1;
        color: #6366f1;
    }

    .btn-check:checked + .btn-outline-category:hover {
        color: white;
    }
</style>
@endsection 