<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of all posts.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Retrieve all posts and load the related user's email
        $posts = Post::with('user:id,email')->get();

        // Return the posts with the user's email in JSON format
        return response()->json($posts);
    }

    /**
     * Display the specified post in detail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // Retrieve the post by ID and load the related user's email
        $post = Post::with('user:id,email')->find($id);

        // Check if post exists
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        // Return the post details with the user's email in JSON format
        return response()->json($post);
    }
}
