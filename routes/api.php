<?php

use App\Http\Controllers\API\PostController;
use Illuminate\Support\Facades\Route;

// Public API routes for blog posts
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
