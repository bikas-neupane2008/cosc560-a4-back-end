<!-- resources/views/posts/create.blade.php -->
@extends('layouts.author')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1 class="mb-4">Create Post</h1>
        <form action="{{ route('author.posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" rows="5" required></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Create</button>
            <a href="{{ route('author.posts.index') }}" class="btn btn-info">Back to Posts</a>
        </form>
    </div>
</div>
@endsection
