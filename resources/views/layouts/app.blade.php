<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="{{ auth()->check() && auth()->user()->theme === 'dark' ? 'dark' : '' }}">
<head>
    {{-- Head as usual --}}
</head>
<body class="bg-white text-slate-900 dark:bg-slate-900 dark:text-slate-100">
{{-- Your nav + content --}}
{{ $slot ?? '' }}
@yield('content')
</body>
</html>
