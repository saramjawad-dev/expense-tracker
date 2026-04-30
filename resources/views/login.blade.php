@extends('layouts.guest')

@section('content')
    <h2 class="guest-title">Welcome Back</h2>

    @if(session('success'))
        <div class="alert alert-success">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label class="form-label" for="email">Email Address</label>
            <input id="email" name="email" type="email" class="form-input" value="{{ old('email') }}" placeholder="you@example.com" required autofocus>
            @error('email')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <input id="password" name="password" type="password" class="form-input" placeholder="Enter your password" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>

    <p class="guest-footer">
        New user? <a href="{{ route('register') }}">Create Account</a>
    </p>
@endsection
