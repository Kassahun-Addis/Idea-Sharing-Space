@extends('layouts.app')

@section('content')
<style>
    /* Add in your app.css or custom stylesheet */
.card {
    border-radius: 8px;
}

.form-control {
    border-radius: 4px;
    box-shadow: none;
}

.btn-primary {
    padding: 12px;
    border-radius: 4px;
}

textarea.form-control {
    resize: vertical;
}
</style>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Create Post</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="POST" class="mt-4">
                    @csrf

                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <!-- Body -->
                    <div class="mb-3">
                        <label for="body" class="form-label">Body:</label>
                        <textarea name="body" id="body" class="form-control" rows="5" required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection