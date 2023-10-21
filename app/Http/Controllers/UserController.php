<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showRegistrationForm(): Factory|View|Application
    {
        return view('auth.register');
    }

    public function showLoginForm(): Factory|View|Application
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);

            Auth::login($user);

            return redirect('/tasks'); // Redirect to a protected page
        } catch (\Exception $e) {
            // Log the exception for debugging
            throw new \Exception($e->getMessage());
            die;

            // Handle the error and return a response as needed
            return back()->with('error', 'Registration failed. Please try again.');
        }
    }


    public function login(Request $request): Redirector|Application|RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Authentication successful
            return redirect('/tasks'); // Redirect to a protected page
        } else {
            // Authentication failed
            return back()->withErrors(['login' => 'Invalid credentials'])->withInput();
        }
    }
}
