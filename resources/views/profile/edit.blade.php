@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>My Profile</h1>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>First Name</label>
                <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Last Name</label>
                <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Car Registration</label>
                <input type="text" name="car_registration" value="{{ old('car_registration', $user->car_registration) }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>
@endsection
