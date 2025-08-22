@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit User</h1>

        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input
                    type="text"
                    name="first_name"
                    value="{{ old('first_name', $user->first_name) }}"
                    class="form-control @error('first_name') is-invalid @enderror">
                @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input
                    type="text"
                    name="last_name"
                    value="{{ old('last_name', $user->last_name) }}"
                    class="form-control @error('last_name') is-invalid @enderror">
                @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Car Registration</label>
                <input
                    type="text"
                    name="car_registration"
                    value="{{ old('car_registration', $user->car_registration) }}"
                    class="form-control @error('car_registration') is-invalid @enderror">
                @error('car_registration')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Save Changes</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
