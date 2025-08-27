<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show a list of all users (with search).
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('car_registration', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(); // Keeps search term in pagination links

        return view('admin.users.index', compact('users', 'search'));
    }

    /**
     * Show edit form for a specific user.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update a specific user.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'car_registration' => 'required|string|max:20|unique:users,car_registration,' . $user->id,
            'email'            => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);


        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }



}
