@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Users</h1>

        {{-- Search --}}
        <form method="GET" action="{{ route('admin.users.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                       placeholder="Search by name, email, or registration..."
                       value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        {{-- Export selected --}}
        <form method="POST" action="{{ route('admin.users.export') }}">
            @csrf
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Select</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Car Registration</th>
                    <th>Theme</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>
                            <input type="checkbox" name="user_ids[]" value="{{ $user->id }}">
                        </td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->car_registration }}</td>
                        <td>{{ ucfirst($user->theme) }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-primary">Edit</a>

                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">No users found.</td></tr>
                @endforelse
                </tbody>
            </table>

            {{ $users->withQueryString()->links() }}

            <button type="submit" class="btn btn-success mt-3">Export Selected</button>

            <form method="POST" action="{{ route('admin.users.export') }}">
                @csrf
                <!-- checkboxes and table here -->
                <button type="submit" class="btn btn-success mt-3">Export all user information</button>
            </form>

        </form>
    </div>
@endsection
