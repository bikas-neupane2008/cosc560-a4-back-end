@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Edit User</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Are you sure you want to update this user?');">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="author" {{ $user->role == 'author' ? 'selected' : '' }}>Author</option>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">New Password <small>(leave blank to keep current password)</small></label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <br>
                <a href="{{ route('admin.users.index') }}" class="btn btn-info d-inline">Back to Users</a>
                <button type="submit" class="btn btn-success">Update</button>
            </form>

            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Are you sure you want to delete this user? All posts by this user will also be deleted.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
