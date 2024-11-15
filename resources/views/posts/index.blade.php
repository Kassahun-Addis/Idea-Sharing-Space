@foreach ($posts as $post)
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>

    <h3>Comments</h3>
    @foreach ($post->comments as $comment)
        <div>
            <strong>{{ $comment->author }}</strong>: {{ $comment->body }}
            <form action="{{ route('replies.store', $comment->id) }}" method="POST">
                @csrf
                <textarea name="body" required></textarea>
                <button type="submit">Reply</button>
            </form>
            @foreach ($comment->replies as $reply)
                <div style="margin-left: 20px;">
                    <strong>{{ $reply->author }}</strong>: {{ $reply->body }}
                </div>
            @endforeach
        </div>
    @endforeach

    <form action="{{ route('comments.store', $post->id) }}" method="POST">
        @csrf
        <textarea name="body" required></textarea>
        <button type="submit">Comment</button>
    </form>
@endforeach