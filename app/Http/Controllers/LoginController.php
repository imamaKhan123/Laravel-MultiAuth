<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Validator;  // Import the Validator Facade

class LoginController extends Controller
{
    /**
     * Display the login form.
     */
    public function index()
    {
        return view("login");
    }

    /**
     * Authenticate the user.
     */
    public function authenticate(Request $request)
    {
        // Validate the login form
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required"
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
              
                return redirect()->route('account.dashboard');
            } else {
                return redirect()->route('account.register')
                    ->with('error', 'Either email or password is incorrect')
                    ->withInput();
            }
        } else {
            return redirect()->route('account.login')
                ->withErrors($validator)
                ->withInput();
        }
    }

    /**
     * Display the dashboard.
     */
    public function dashboard()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('dashboard', compact('user'));
    }

    /**
     * Show the registration form.
     */
    public function register(Request $request)
    {
        return view('register');
    }

    /**
     * Process the registration form.
     */
    public function processRegister(Request $request)
{
   // Validate the registration form
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:users,email', // Ensure the email is unique in the users table
        'password' => 'required|confirmed|min:8', // The password should be confirmed and at least 8 characters long
        'password_confirmation' => 'required|same:password', // Ensure that confirm_password matches password
    ]);

    // If validation fails, redirect back with errors and input
    if ($validator->fails()) {
        return redirect()->route('account.register')
            ->withErrors($validator)
            ->withInput(); // Retain the input so the user doesn't need to re-enter it
    }

    // Create the new user
    $user = new User();
    $user->name = $request->input('name');  // Assuming you have a 'name' field in the form
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('password'));  // Hash the password
    $user->role = 'customer';  // Assuming all users have the 'customer' role by default
    $user->save();  // Save the new user to the database

    // Redirect to the login page with a success message
    return redirect()->route('account.login')
        ->with('success', 'You have registered successfully! Please log in.');
}


    // The following methods seem to be placeholders
    public function edit(string $id)
    {
        // Placeholder for edit functionality
    }

    public function update(Request $request, string $id)
    {
        // Placeholder for update functionality
    }

    public function logout( )
    {
        Auth::logout();
        return redirect()->route('account.login')->with('success','you are logged out');
    }
}
