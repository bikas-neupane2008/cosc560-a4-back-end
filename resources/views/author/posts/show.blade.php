@extends('layouts.author')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1 class="mb-4">{{ $post->title }}</h1>
        <div class="d-flex justify-content-between">
            <p class="mb-0">Updated At: {{ $post->updated_at->setTimezone('Australia/Sydney')->format('D, d M, Y h:i:s A') }}</p>
            <p class="mb-0">Created At: {{ $post->created_at->setTimezone('Australia/Sydney')->format('D, d M, Y h:i:s A') }}</p>
        </div>
        <hr>
        </ul>
        <p>{{ $post->content }}</p>
        <a href="{{ route('author.posts.index') }}" class="btn btn-info">Back to Posts</a>
        <a href="{{ route('author.posts.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
        <form action="{{ route('author.posts.destroy', $post->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this post?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection
