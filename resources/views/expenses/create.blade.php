@extends('layouts.app')

@section('header')
    <h1>Add Expense</h1>
    <p>Record a new spending entry</p>
@endsection

@section('content')
    <div class="container-medium">
        <div class="card fade-in-up">
            <form method="POST" action="{{ route('expenses.store') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="title">Title</label>
                    <input id="title" name="title" type="text" class="form-input" value="{{ old('title') }}" placeholder="e.g. Grocery Shopping" required>
                    @error('title')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="amount">Amount ($)</label>
                        <input id="amount" name="amount" type="number" step="0.01" class="form-input" value="{{ old('amount') }}" placeholder="0.00" required>
                        @error('amount')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="category">Category</label>
                        <select id="category" name="category" class="form-select" required>
                            <option value="" disabled {{ old('category') ? '' : 'selected' }}>Select category</option>
                            <option value="Food" {{ old('category') == 'Food' ? 'selected' : '' }}>Food</option>
                            <option value="Transport" {{ old('category') == 'Transport' ? 'selected' : '' }}>Transport</option>
                            <option value="Shopping" {{ old('category') == 'Shopping' ? 'selected' : '' }}>Shopping</option>
                            <option value="Bills" {{ old('category') == 'Bills' ? 'selected' : '' }}>Bills</option>
                            <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('category')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                <div class="form-group">
                    <label class="form-label" for="date">Date</label>
                    <input id="date" name="date" type="date" class="form-input" value="{{ old('date') }}" required>
                    @error('date')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-actions">
                    <a class="btn btn-primary" href="{{ route('expenses.index') }}" >&#8592; Back to Expenses</a>
                    <button type="submit" class="btn btn-primary">
                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                        Add Expense
                    </button>
                </div>
            </form>
        </div>
@endsection
