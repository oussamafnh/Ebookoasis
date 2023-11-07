<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Existing methods...
    public function index()
    {
        $users = User::all();
        return view('dashboard.users', compact('users'));
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create a new User instance
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        // Save the user in the database
        $user->save();

        // Redirect to the user profile page
        return redirect()->route('users.login')->with('success', 'Registration successful.');
        //return view('auth.login');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the login form data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Redirect to the intended page or a default page
            
            if ($user && $user->role === 1) {
                return redirect()->route('dashboard.index');
            }

            return redirect()->route('layouts.home')->with('success', 'Login successful.');
        }

        // Failed login attempt
        return back()->withErrors([
            'email' => 'incorrect email try again',
            'password' => 'incorrect password try again',
        ]);
    }

    public function showProfile()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Retrieve ebooks associated with the user's likes
        $likes = Like::where('user_id', $user->id)->pluck('ebook_id');
        $ebooks = Ebook::whereIn('id', $likes)->get();

        // Check if the user is authenticated
        if ($user) {
            return view('profile.show', ['user' => $user, 'ebooks' => $ebooks]);
        } else {
            return redirect()->route('users.login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('users.showLoginForm')->with('success', 'Logout successful.');
    }


    public function destroy()
    {
        
        // Get the authenticated user
        $user = Auth::user();
    
        // Check if the user is authenticated
        if ($user) {
            // Delete the associated likes and reviews
            $user->likes()->delete();
            $user->reviews()->delete();
    
            // Logout the user
            Auth::logout();
    
            // Delete the user account
            $user->delete();

            // Redirect to a relevant page or show a success message
            return redirect()->route('layouts.home')->with('success', 'Your account has been deleted.');
        }
    
        // If the user is not authenticated, redirect to the login page
        return redirect()->route('layouts.home');
    }
    public function Admindestroy(User $user)
    {
        $user->likes()->delete();
        $user->reviews()->delete();
        $user->delete();

        return redirect()->route('dashboard.index')->with('success', 'User deleted successfully.');
    }


    public function showEditForm()
    {
        // Get the authenticated user
        $user = Auth::user();
    
        // Check if the user is authenticated
        if ($user) {
            return view('auth.edit', ['user' => $user]);
        }
    
        // If the user is not authenticated, you can handle it differently,
        // such as redirecting them to the home page or displaying an error message.
        // Example:
        return redirect()->route('layouts.home')->with('error', 'You must be logged in to access this page.');
    }
    

    public function update(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated
        if ($user) {
            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                // Add more validation rules for other fields if needed
            ]);

            // Update the user information
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            // Update other fields as needed

            $user->save();

            // Redirect to a relevant page or show a success message
            return redirect()->route('users.showProfile')->with('success', 'Your information has been updated.');
        }

        // If the user is not authenticated, redirect to the login page
        return redirect()->route('users.login');
    }
    // Existing methods...

    public function homeview()
    {
        $user = Auth::user();
        $ebooks = Ebook::latest()->limit(6)->get();
        $ebookCount = Ebook::count();
        $userCount = User::count();
    
        if ($user && $user->role === 1) {
            return view('dashboard.index', compact('ebookCount', 'userCount'));
        }
    
        return view('layouts.home', compact('ebooks'));
    }
    

}
