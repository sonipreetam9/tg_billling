<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Str;

class AuthController extends Controller
{
    public function login_page()
    {
        if (Auth::check()) {
            return redirect()->route('home.page');
        }
        return view('software.auth.login');
    }
    public function register_page()
    {

        if (Auth::check()) {
            return redirect()->route('home.page');
        }
        return view('software.auth.register');
    }
    public function check_login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => ['required', 'string', 'regex:/^[a-zA-Z0-9]+$/'],
        ], [
            'password.regex' => 'Password must contain only letters and numbers.'
        ]);

        // Check if 'remember me' is checked
        $remember = $request->has('remember');

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $user = Auth::user();

            // If "remember me" is checked, store token in cookie for 3 years
            if ($remember) {
                $years = 3;
                $minutes = $years * 365 * 24 * 60;
                cookie()->queue(cookie('remember_web_token', $user->remember_token, $minutes));
            }

            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }

        return redirect()->back()->with('error', 'Invalid login credentials!');
    }


    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $user->remember_token = null; // Remove Remember Token
            $user->save();
        }

        Auth::logout();

        // **Cookie Remove करें**
        cookie()->queue(cookie()->forget('remember_web_token'));

        return redirect()->route('login')->with('success', 'सफलतापूर्वक लॉगआउट किया गया!');
    }

    public function register_post(Request $request)
    {
        // Validate user input (Only letters and numbers allowed in password)
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
                'regex:/^[a-zA-Z0-9]+$/'
            ],
        ], [
            'password.regex' => 'Password must contain only letters and numbers.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min' => 'Password must be at least 6 characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.'
        ]);

        try {
            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'in_hash' => base64_encode($request->password),
                'remember_token' => Str::random(60),
            ]);

            return redirect()->route('login')->with('success', 'Successfully registered!');

        } catch (\Exception $e) {
            return redirect()->route('register')->with('error', 'Registration failed: ' . $e->getMessage());
        }
    }

}








