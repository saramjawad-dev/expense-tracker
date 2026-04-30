@extends('layouts.guest')

@section('content')
    <h2 class="guest-title">Create Account</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label class="form-label" for="name">Full Name</label>
            <input id="name" name="name" type="text" class="form-input" value="{{ old('name') }}" placeholder="John Doe" required autofocus>
            @error('name')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Email Address</label>
            <input id="email" name="email" type="email" class="form-input" value="{{ old('email') }}" placeholder="you@example.com" required>
            @error('email')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <input id="password" name="password" type="password" class="form-input" placeholder="Min 6 characters" required>
            @error('password')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-input" placeholder="Repeat password" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>

    <p class="guest-footer">
        Already have an account? <a href="{{ route('login') }}">Login</a>
    </p>
@endsection
