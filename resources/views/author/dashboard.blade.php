@extends('layouts.author')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Author Dashboard</h1>
                <p>Welcome, {{ auth()->user()->name }}.</p>
                <p>
                    <a href="{{ route('author.posts.index') }}">Click here to view your posts.</a>
                </p>
            </div>
        </div>
    </div>
@endsection
