@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4">Manage Users</h1>
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
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-4">Create New User</a>

        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a>
                            </h5>
                            <p class="card-text">Role: {{ ucfirst($user->role) }}</p>
                            <p class="card-text">Email: {{ $user->email }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Joined At: {{ $user->created_at->setTimezone('Australia/Sydney')->format('D, d M, Y h:i:s A') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $users->links('vendor.pagination.bootstrap-5') }} <!-- Pagination links -->
        </div>
    </div>
</div>
@endsection
