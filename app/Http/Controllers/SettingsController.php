<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingsRequest;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function edit(Request $request)
    {
        return view('settings.edit', ['user' => $request->user()]);
    }

    public function update(UpdateSettingsRequest $request)
    {
        $request->user()->update($request->validated());
        return back()->with('status','Settings saved.');
    }
}
