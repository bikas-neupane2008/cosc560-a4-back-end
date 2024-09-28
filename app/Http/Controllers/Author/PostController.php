<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Middleware to check if the user is an author
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role !== 'author') {
                return redirect('/'); // Redirect non-author users to the home page
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the author's posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get only posts that belong to the authenticated author
        $posts = Auth::user()->posts()->orderBy('updated_at', 'desc')->paginate(9);
        return view('author.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.posts.create'); // Author can create new posts
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create a new post for the authenticated author
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id(); // Associate the post with the logged-in author
        $post->save();

        return redirect()->route('author.posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // Ensure the authenticated author is the owner of the post
        if (Auth::id() != $post->user_id) {
            abort(403); // Forbidden
        }
        return view('author.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // Ensure the authenticated author is the owner of the post
        if (Auth::id() != $post->user_id) {
            abort(403); // Forbidden
        }
        return view('author.posts.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Ensure the authenticated author is the owner of the post
        if (Auth::id() != $post->user_id) {
            abort(403); // Forbidden
        }

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('author.posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Ensure the authenticated author is the owner of the post
        if (Auth::id() != $post->user_id) {
            abort(403); // Forbidden
        }

        $post->delete();
        return redirect()->route('author.posts.index')->with('success', 'Post deleted successfully.');
    }
}
