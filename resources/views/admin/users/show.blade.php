@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 class="mb-4">{{ $user->name }}</h1>
        <div class="d-flex justify-content-between">
            <p class="mb-0">Email: {{ $user->email }}</p>
            <p class="mb-0">Role: {{ ucfirst($user->role) }}</p>
        </div>
        <div class="d-flex justify-content-between mt-2">
            <p class="mb-0">Joined At: {{ $user->created_at->setTimezone('Australia/Sydney')->format('D, d M, Y h:i:s A') }}</p>
            <p class="mb-0">Last Updated: {{ $user->updated_at->setTimezone('Australia/Sydney')->format('D, d M, Y h:i:s A') }}</p>
        </div>
        <hr>
        <a href="{{ route('admin.users.index') }}" class="btn btn-info">Back to Users</a>
        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-secondary">Edit</a>
        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline"
            onsubmit="return confirm('Are you sure you want to delete this user? All posts by this user will also be deleted.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection
