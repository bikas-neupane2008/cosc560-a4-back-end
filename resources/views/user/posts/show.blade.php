<!-- resources/views/posts/show.blade.php -->
@extends('layouts.user')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1 class="mb-4">{{ $post->title }}</h1>
        <div class="d-flex justify-content-between">
            <p class="mb-0">Updated At: {{ $post->updated_at->setTimezone('Australia/Sydney')->format('D, d M, Y h:i:s A') }}</p>
            <p class="mb-0">Updated By:
                {{ $post->user ? $post->user->email : 'Unknown' }}
            </p>
        </div>
        <hr>
        </ul>
        <p>{{ $post->content }}</p>
        <a href="{{ route('user.posts.index') }}" class="btn btn-info">Back to Posts</a>
    </div>
</div>
@endsection
