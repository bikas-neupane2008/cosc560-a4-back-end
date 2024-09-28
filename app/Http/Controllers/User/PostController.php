<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Middleware to check if the user has the 'user' role
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role !== 'user') {
                return redirect('/'); // Redirect non-user roles to the home page
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of all posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all posts in descending order of creation
        $posts = Post::orderBy('created_at', 'desc')->paginate(9);
        return view('user.posts.index', compact('posts'));
    }

    /**
     * Display the specified post in detail.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('user.posts.show', compact('post')); // Display detailed view of the post
    }
}
