@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Admin Dashboard</h1>
                <p>Welcome, {{ auth()->user()->name }}.</p>
                <p>
                    <a href="{{ route('admin.posts.index') }}">Click here to view all Posts.</a>
                </p>
                <p>
                    <a href="{{ route('admin.users.index') }}">Click here to view all Users.</a>
                </p>
            </div>
        </div>
    </div>
@endsection
