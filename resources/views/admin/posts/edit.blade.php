@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Update Post</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" id="edit-post-form"
                onsubmit="return confirm('Are you sure you want to update this post?');">

                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="role">Assign to Role</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="self" {{ $post->user_id == Auth::id() ? 'selected' : '' }}>Assign to Myself
                        </option>
                        <option value="admin" {{ $post->user && $post->user->role == 'admin' ? 'selected' : '' }}>Admin
                        </option>
                        <option value="author" {{ $post->user && $post->user->role == 'author' ? 'selected' : '' }}>Author
                        </option>
                    </select>
                </div>
                <div class="form-group" id="user-select" style="{{ $post->user_id != Auth::id() ? '' : 'display: none;' }}">
                    <label for="user_email">Assign to User</label>
                    <input type="text" id="user-search" class="form-control" placeholder="Search User by Email"
                        autocomplete="off">
                    <select id="user-dropdown" class="form-control"
                        style="{{ $post->user_id != Auth::id() ? '' : 'display: none;' }}">
                        @if ($post->user && $post->user_id != Auth::id())
                            <option value="{{ $post->user->email }}" selected>{{ $post->user->email }}</option>
                        @endif
                    </select>
                    <input type="hidden" name="user_email" id="user-email"
                        value="{{ $post->user ? $post->user->email : '' }}">
                    <small id="no-results" class="text-danger" style="display: none;">No users found with that
                        email.</small>
                </div>
                <br>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-info d-inline">Back to Posts</a>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
    // Initially disable submit button if necessary
    $('#submit-btn').prop('disabled', true);

    // Handle role selection
    $('#role').on('change', function() {
        var role = $(this).val();
        $('#user-dropdown').hide();
        $('#user-search').val('');
        $('#no-results').hide();
        $('#user-email').val(''); // Clear the hidden user_email field

        if (role === 'self') {
            $('#user-select').hide();
            $('#submit-btn').prop('disabled', false); // Enable submit button for 'self'
        } else if (role === 'admin' || role === 'author') {
            $('#user-select').show();
            $('#submit-btn').prop('disabled', true); // Disable submit button until a valid user is selected
        } else {
            $('#user-select').hide();
            $('#submit-btn').prop('disabled', true); // Disable submit button if no valid role is selected
        }
    });

    // User search functionality
    $('#user-search').on('keyup', function() {
        var query = $(this).val();
        var role = $('#role').val();

        if (query.length > 0 && role) {
            $.ajax({
                url: "{{ route('admin.users.search') }}", // Route to your search function
                type: "GET",
                data: {
                    query: query,
                    role: role
                },
                success: function(data) {
                    $('#user-dropdown').empty().hide();
                    $('#no-results').hide();

                    // Add default option as 'Select User from here...'
                    $('#user-dropdown').append('<option value="">Select User from here...</option>');

                    if (data.users.length > 0) {
                        $('#user-dropdown').show();
                        $.each(data.users, function(index, user) {
                            $('#user-dropdown').append('<option value="' + user.email + '">' + user.email + '</option>');
                        });
                        validateForm(); // Re-validate form after fetching users
                    } else {
                        $('#no-results').show();
                        $('#submit-btn').prop('disabled', true); // Disable submit button if no users are found
                    }
                }
            });
        } else {
            $('#user-dropdown').hide();
            $('#no-results').hide();
            $('#submit-btn').prop('disabled', true); // Disable submit button if query is invalid
        }
    });

    // Handle dropdown selection
    $('#user-dropdown').on('change', function() {
        var selectedUserEmail = $(this).val();
        if (selectedUserEmail === "") { // If "Select User from here..." option is selected
            $('#user-email').val(''); // Clear the hidden input
            $('#submit-btn').prop('disabled', true); // Disable the submit button
        } else {
            $('#user-email').val(selectedUserEmail); // Set the user_email hidden input
            validateForm(); // Validate form after selecting user
        }
    });

    // Validate form and enable/disable submit button accordingly
    function validateForm() {
        var role = $('#role').val();
        var userEmail = $('#user-email').val();

        if (role === 'self') {
            $('#submit-btn').prop('disabled', false); // Enable for 'self'
        } else if (role && userEmail) {
            $('#submit-btn').prop('disabled', false); // Enable if role is 'admin' or 'author' and userEmail is selected
        } else {
            $('#submit-btn').prop('disabled', true); // Disable if conditions are not met
        }
    }

    // Prevent form submission if validation fails and add debug information
    $('#edit-post-form').on('submit', function(e) {
        var role = $('#role').val();
        var userEmail = $('#user-email').val();

        if ((role === 'admin' || role === 'author') && !userEmail) {
            e.preventDefault(); // Prevent form submission
            alert('Please select a user for the chosen role.');
        }
    });
});

    </script>
@endsection
