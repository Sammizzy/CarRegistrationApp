@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit User</h1>

        <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input

                    value="{{ old('first_name', $user->first_name) }}">
                @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input

                    value="{{ old('last_name', $user->last_name) }}">
                @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    value="{{ old('email', $user->email) }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Car Registration</label>
                <input
                    value="{{ old('car_registration', $user->car_registration) }}">
                @error('car_registration')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Save Changes</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
