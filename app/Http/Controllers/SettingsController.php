<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function edit()
    {
        return view('settings.edit', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'theme' => 'required|in:light,dark',
        ]);

        auth()->user()->update(['theme' => $request->theme]);

        return back()->with('success', 'Theme updated.');
    }
}
