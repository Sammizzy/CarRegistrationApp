@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Settings</h1>

        <div class="card mb-3">
            <div class="card-body">
                <p><strong>Name:</strong> {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Theme:</strong> {{ ucfirst(auth()->user()->theme) }}</p>
            </div>
        </div>

        <a href="{{ route('admin.users') }}" class="btn btn-primary">Manage Users</a>
    </div>
@endsection
