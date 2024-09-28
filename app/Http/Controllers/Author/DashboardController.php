<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Middleware to check if the user is an author
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role !== 'author') {
                return redirect('/'); // Redirect non-author users to home page
            }
            return $next($request);
        });
    }

    /**
     * Display the author dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('author.dashboard');
    }
}
