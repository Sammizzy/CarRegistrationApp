@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Register</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Car Registration</label>
                <input type="text" name="car_registration" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <p class="mt-3">
            Already have an account? <a href="{{ route('login') }}">Login here</a>
        </p>
    </div>
@endsection
