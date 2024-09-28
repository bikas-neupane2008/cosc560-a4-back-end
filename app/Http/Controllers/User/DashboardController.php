<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Middleware to check if the user is an user
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role !== 'user') {
                return redirect('/'); // Redirect non users to home page
            }
            return $next($request);
        });
    }

    /**
     * Display the user dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.dashboard');
    }
}
