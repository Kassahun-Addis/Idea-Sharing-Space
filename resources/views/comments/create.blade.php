{{-- resources/views/comments/create.blade.php --}}

@extends('layouts.app')

@section('title', 'Add Comment')

@section('content')
    <h1 class="text-center mb-4">Add Comment</h1>
    <form action="{{ route('comments.store', $post->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="body" class="form-label">Comment:</label>
            <textarea name="body" id="body" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>
@endsection