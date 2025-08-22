<x-app-layout>
    <h1 class="text-xl font-semibold mb-4">Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label>Email</label>
            <input type="email" name="email" required autofocus>
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Login</button>
        </div>
    </form>
</x-app-layout>
