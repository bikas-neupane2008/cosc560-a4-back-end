<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Middleware to ensure only admin users can access these routes
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role !== 'admin') {
                return redirect('/'); // Redirect non-admin users to the home page
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of all posts.
     */
    public function index()
    {
        $posts = Post::with('user')->orderBy('updated_at', 'desc')->paginate(9); // Eager load the user data
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view('admin.posts.create'); // Admin can create posts
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'role' => 'required|string|in:self,admin,author',  // Ensure role is one of the allowed values
            'user_email' => 'nullable|email|exists:users,email',  // Validate user email if provided
        ]);

        // Debug: Inspect the role and user_email
        // dd('Validated Data:', $validatedData);

        // Determine the user ID based on the role selection
        if ($validatedData['role'] === 'self') {
            $userId = Auth::id(); // Assign the post to the current admin
        } else {
            if (!empty($validatedData['user_email'])) {
                $user = User::where('email', $validatedData['user_email'])->first();
                if ($user) {
                    $userId = $user->id;
                } else {
                    // If the user is not found for some reason, return with an error
                    return back()->withErrors(['user_email' => 'The selected user does not exist.'])->withInput();
                }
            } else {
                return back()->withErrors(['user_email' => 'Please select a valid user for the chosen role.'])->withInput();
            }
        }

        // Debug: Inspect the user ID before creating the post
        // dd('User ID:', $userId);

        // Create the post and assign it to the selected user
        Post::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'user_id' => $userId,
        ]);

        // Redirect back to the posts index with a success message
        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
{
    // Debug: Inspect the post data before rendering the view
    // dd('Post Data for Show:', $post);

    return view('admin.posts.show', compact('post')); // Admin can view any post
}

    /**
     * Show the form for editing the specified post.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post')); // Admin can edit any post
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'role' => 'required|string|in:self,admin,author',  // Ensure role is one of the allowed values
            'user_email' => 'nullable|email|exists:users,email',  // Validate user email if provided
        ]);

        // Debug: Inspect the request data after validation
        // dd('Validated Data:', $validatedData);

        // Determine the user ID based on the role selection
        if ($validatedData['role'] === 'self') {
            $userId = Auth::id(); // Assign the post to the current admin
        } elseif (in_array($validatedData['role'], ['admin', 'author'])) {
            if (!empty($validatedData['user_email'])) {
                $user = User::where('email', $validatedData['user_email'])->first();
                if ($user) {
                    $userId = $user->id;
                } else {
                    return back()->withErrors(['user_email' => 'The selected user does not exist.']);
                }
            } else {
                return back()->withErrors(['user_email' => 'Please select a valid user for the chosen role.']);
            }
        } else {
            return back()->withErrors(['role' => 'Invalid role selection.']);
        }

        // Debug: Inspect the user ID before updating the post
        // dd('User ID:', $userId);

        // Update the post and assign it to the selected user
        $post->update([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'user_id' => $userId,
        ]);

        // Redirect back to the posts index with a success message
        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete(); // Admin can delete any post
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
