<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel App') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel App') }}
        </a>

        <ul class="navbar-nav ms-auto">
            @guest
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
            @else
{{--                <li class="nav-item"><a href="{{ route('profile.index') }}" class="nav-link">Profile</a></li>--}}
                <li class="nav-item"><a href="{{ route('settings.edit') }}" class="nav-link">Settings</a></li>

                @if(auth()->user()->is_admin)
                    <li class="nav-item"><a href="{{ route('admin.settings') }}" class="nav-link">Admin</a></li>
                @endif

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-link nav-link">Logout</button>
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</nav>

<main>
    @yield('content')
</main>
</body>
</html>
