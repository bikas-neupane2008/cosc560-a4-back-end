<?php

use App\Http\Controllers\User\PostController as UserPostController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Author\DashboardController as AuthorDashboardController;
use App\Http\Controllers\Author\PostController as AuthorPostController;
use App\Http\Controllers\Auth\AuthorRegisterController as AuthorRegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthorMiddleware;

// Public route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

// User Routes
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function() {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::resource('posts', UserPostController::class)->names('user.posts');

});

// Admin Routes (Protected by AdminMiddleware)
Route::group(['prefix' => 'admin', 'middleware' => [AdminMiddleware::class]], function() {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', AdminUserController::class)->names('admin.users');
    Route::resource('posts', AdminPostController::class)->names('admin.posts');
    Route::get('/admin/users/search', [AdminUserController::class, 'search'])->name('admin.users.search');
});

// Author Routes (Protected by AuthorMiddleware)
Route::group(['prefix' => 'author', 'middleware' => [AuthorMiddleware::class]], function() {
    Route::get('/dashboard', [AuthorDashboardController::class, 'index'])->name('author.dashboard');
    Route::resource('posts', AuthorPostController::class)->names('author.posts');
});

// Author Registration
Route::get('/author/register', [AuthorRegisterController::class, 'showRegistrationForm'])->name('author.register');
Route::post('/author/register', [AuthorRegisterController::class, 'register']);

// Test route for checking role (for development/testing purposes)
Route::get('/test-role', function() {
    if (Auth::check()) {
        dd(Auth::user()->role); // Output the role of the currently authenticated user
    } else {
        return redirect('/login');
    }
})->middleware('auth');

// Authentication routes
Auth::routes();
