<x-app-layout>
    <h1 class="text-xl font-semibold mb-4">Your Profile</h1>

    @if (session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    @auth
        <div class="mb-4 space-x-2">
            <a href="{{ route('profile.edit') }}" class="text-blue-600">Profile</a>
            <a href="{{ route('settings.edit') }}" class="text-blue-600">Settings</a>

            @if(auth()->user()->is_admin)
                <a href="{{ route('admin.settings') }}" class="text-blue-600">Admin</a>
            @endif
        </div>
    @endauth

    <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm">First Name</label>
            <input name="first_name" value="{{ old('first_name', $user->first_name) }}" class="border p-2 w-full">
            @error('first_name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm">Last Name</label>
            <input name="last_name" value="{{ old('last_name', $user->last_name) }}" class="border p-2 w-full">
            @error('last_name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm">Car Registration</label>
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
