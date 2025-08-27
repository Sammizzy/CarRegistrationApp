<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle registration.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'email'            => 'required|email|unique:users,email',
            'car_registration' => 'required|string|max:20|unique:users,car_registration',
            'password'         => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'first_name'       => $validated['first_name'],
            'last_name'        => $validated['last_name'],
            'email'            => $validated['email'],
            'car_registration' => $validated['car_registration'],
            'password'         => Hash::make($validated['password']),
            'is_admin'         => false, // self-registered users are not admins
            'theme'            => 'light',
        ]);

        Auth::login($user);

        return redirect()->route('profile.edit')
            ->with('success', 'Account created successfully!');
    }
}
