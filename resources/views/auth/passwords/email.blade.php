@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Forgot Password</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Enter your email address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning">Send Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
