<x-app-layout>
    <h1 class="text-xl font-semibold mb-4">Your Profile</h1>

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

    <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('PATCH')

        <div>
            <label class="block text-sm">First name</label>
            <input name="first_name" value="{{ old('first_name', $user->first_name) }}" class="border p-2 w-full">
            @error('first_name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm">Last name</label>
            <input name="last_name" value="{{ old('last_name', $user->last_name) }}" class="border p-2 w-full">
            @error('last_name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm">Car registration</label>
            <input name="car_registration" value="{{ old('car_registration', $user->car_registration) }}" class="border p-2 w-full">
            @error('car_registration') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm">Email</label>
            <input name="email" value="{{ old('email', $user->email) }}" class="border p-2 w-full">
            @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded">Save</button>
    </form>
</x-app-layout>
