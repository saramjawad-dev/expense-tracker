@extends('layouts.app')

@section('header')
    <h1>Dashboard</h1>
    <p>Welcome to your personal expense tracker</p>
@endsection

@section('content')
    <div class="container-narrow">
        <div class="card fade-in-up" style="text-align:center;padding:3rem 2rem;">
            <h1 style="font-size:2rem;font-weight:800;background:linear-gradient(135deg,var(--primary) 0%,#1e40af 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;margin-bottom:0.75rem;">
                Welcome back, {{ auth()->user()->name }}!
            </h1>
            <p style="color:var(--gray-500);margin-bottom:2rem;">
                Manage your expenses efficiently with our professional tracker.
            </p>
            <a href="{{ route('expenses.index') }}" class="btn btn-primary btn-lg">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Go to My Expenses
            </a>
        </div>
@endsection
