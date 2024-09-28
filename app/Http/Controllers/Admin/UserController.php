<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Middleware to check if the user is an admin
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role !== 'admin') {
                return redirect('/'); // Redirect non-admin users to the home page
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10); // Admin can view all users
        // Debug: Inspect users data
        // dd('All Users:', $users);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create'); // Admin can create new users
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,author,user',
        ]);

        // Debug: Inspect validated data before saving
        // dd('Validated Data for User Creation:', $validatedData);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // Debug: Inspect the user data to be displayed
        // dd('User Data for Show:', $user);

        return view('admin.users.show', compact('user')); // Admin can view user details
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // Debug: Inspect the user data to be edited
        // dd('User Data for Edit:', $user);

        return view('admin.users.edit', compact('user')); // Admin can edit any user
    }

    /**
 * Update the specified user in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\User  $user
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, User $user)
{
    // Check if the authenticated user is trying to change their own role
    if (auth()->user()->id == $user->id && $request->role !== $user->role) {
        // Redirect back with an error message if the user tries to change their own role
        return redirect()->route('admin.users.index')->with('error', 'You cannot change your own role.');
    }

    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id, // Allow the same email for the current user
        'role' => 'required|in:admin,author,user', // Validate the role
        'password' => 'nullable|string|min:8|confirmed', // Password is optional during update
    ]);

    // Debug: Inspect the validated data for user update
    // dd('Validated Data for User Update:', $validatedData);

    // Update the user data
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];

    // Only update the role if the user is not updating their own role
    if (auth()->user()->id !== $user->id) {
        $user->role = $validatedData['role']; // Allow role update only for other users
    }

    // Update password if provided
    if (!empty($validatedData['password'])) {
        $user->password = Hash::make($validatedData['password']);
    }

    // Save the user updates
    $user->save();

    // Redirect back with a success message
    return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
}


    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // Prevent the authenticated user from deleting their own account
        if (auth()->user()->id == $user->id) {
            return redirect()->route('admin.users.index')->with('error', 'You cannot delete your own account.');
        }

        // Check if the user has any posts
        $posts = Post::where('user_id', $user->id)->get();

        // Debug: Inspect the posts associated with the user
        // dd('Posts by User to be Deleted:', $posts);

        if ($posts->isNotEmpty()) {
            // Delete all posts associated with the user
            Post::where('user_id', $user->id)->delete();
        }

        // Debug: Inspect the user before deletion
        // dd('User to be Deleted:', $user);

        // Delete the user
        $user->delete();

        // Redirect back to the users index with a success message
        return redirect()->route('admin.users.index')->with('success', $posts->isNotEmpty() ? 'User and all related posts deleted successfully.' : 'User deleted successfully.');
    }

    /**
     * Search for users based on role and query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $query = $request->get('query');
        $role = $request->get('role');

        // Debug: Inspect the query and role before searching
        // dd('Search Query:', $query, 'Role:', $role);

        // Fetch users based on the role and query (searching only by email)
        $users = User::where('role', $role)
            ->where('email', 'LIKE', "%$query%")
            ->get();

        // Debug: Inspect the search results
        // dd('Search Results:', $users);

        return response()->json(['users' => $users]);
    }
}
