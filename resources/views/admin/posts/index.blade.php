@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Blog Posts</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-4">Create Post</a>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
                                </h5>
                                <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Updated At:
                                    {{ $post->updated_at->setTimezone('Australia/Sydney')->format('D, d M, Y h:i:s A') }}</small>
                                <br>
                                <small class="text-muted">Updated By:
                                    {{ $post->user ? $post->user->email : 'Unknown' }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{ $posts->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
