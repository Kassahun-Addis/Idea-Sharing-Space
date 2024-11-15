{{-- resources/views/posts/show.blade.php --}}

@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1 class="text-center mb-4">{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>

    <h4>Comments</h4>
    @foreach ($post->comments as $comment)
        <div class="mb-2">
            <strong>{{ $comment->author }}</strong>: {{ $comment->body }}
            <form action="{{ route('replies.store', $comment->id) }}" method="POST">
                @csrf
                <textarea name="body" class="form-control" required></textarea>
                <button type="submit" class="btn btn-secondary btn-sm">Reply</button>
            </form>
            @foreach ($comment->replies as $reply)
                <div class="ml-4">
                    <strong>{{ $reply->author }}</strong>: {{ $reply->body }}
                </div>
            @endforeach
        </div>
    @endforeach

    <form action="{{ route('comments.store', $post->id) }}" method="POST">
        @csrf
        <textarea name="body" class="form-control" required></textarea>
        <button type="submit" class="btn btn-primary">Comment</button>
    </form>
@endsection