<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the user's profile edit form.
     */
    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'car_registration' => 'required|string|max:20|unique:users,car_registration,' . $user->id,
        ]);

        $user->update($validated);

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile updated successfully.');
    }
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }



}

