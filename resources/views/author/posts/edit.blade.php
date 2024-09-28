@extends('layouts.author')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1 class="mb-4">Edit Post</h1>

        <form action="{{ route('author.posts.update', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to update this post?');">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
            </div>
            <br>
            <a href="{{ route('author.posts.index') }}" class="btn btn-info d-inline">Back to Posts</a>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
        <form action="{{ route('author.posts.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection
