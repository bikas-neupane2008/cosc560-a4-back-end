@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>User Dashboard</h1>
                <p>Welcome, {{ auth()->user()->name }}.</p>
                <p>
                    <a href="{{ route('user.posts.index') }}">Click here to view all posts.</a>
                </p>
            </div>
        </div>
    </div>
@endsection
