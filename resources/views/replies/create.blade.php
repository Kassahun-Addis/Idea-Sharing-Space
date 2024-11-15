{{-- resources/views/replies/create.blade.php --}}

@extends('layouts.app')

@section('title', 'Add Reply')

@section('content')
    <h1 class="text-center mb-4">Add Reply</h1>
    <form action="{{ route('replies.store', $comment->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="body" class="form-label">Reply:</label>
            <textarea name="body" id="body" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-secondary">Submit Reply</button>
    </form>
@endsection