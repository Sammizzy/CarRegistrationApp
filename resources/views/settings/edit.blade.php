<x-app-layout>
    <h1 class="text-xl font-semibold mb-4">Settings</h1>

    @if (session('status'))
        <div class="mb-4 text-green-600">{{ session('status') }}</div>
    @endif

    @auth
        <a href="{{ route('profile.edit') }}">Profile</a>
        <a href="{{ route('settings.edit') }}">Settings</a>

        @if(auth()->user()->is_admin)
            <a href="{{ route('admin.users.index') }}">Admin</a>
        @endif
    @endauth

    <form method="POST" action="{{ route('settings.update') }}" class="space-y-4">
        @csrf
        @method('PATCH')

        <div>
            <label class="block text-sm">Theme</label>
            <select name="theme" class="border p-2">
                <option value="light" @selected(auth()->user()->theme === 'light')>Light</option>
                <option value="dark" @selected(auth()->user()->theme === 'dark')>Dark</option>
            </select>
            @error('theme') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded">Save</button>
    </form>
</x-app-layout>
