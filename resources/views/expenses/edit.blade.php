@extends('layouts.app')

@section('header')
    <h1>Edit Expense</h1>
    <p>Update your spending entry</p>
@endsection

@section('content')
    <div class="container-medium">
        <div class="card fade-in-up">
            <form method="POST" action="{{ route('expenses.update', $expense->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="title">Title</label>
                    <input id="title" name="title" type="text" class="form-input" value="{{ old('title', $expense->title) }}" placeholder="e.g. Grocery Shopping" required>
                    @error('title')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="amount">Amount ($)</label>
                        <input id="amount" name="amount" type="number" step="0.01" class="form-input" value="{{ old('amount', $expense->amount) }}" placeholder="0.00" required>
                        @error('amount')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="category">Category</label>
                        <select id="category" name="category" class="form-select" required>
                            <option value="Food" {{ old('category', $expense->category) == 'Food' ? 'selected' : '' }}>Food</option>
                            <option value="Transport" {{ old('category', $expense->category) == 'Transport' ? 'selected' : '' }}>Transport</option>
                            <option value="Shopping" {{ old('category', $expense->category) == 'Shopping' ? 'selected' : '' }}>Shopping</option>
                            <option value="Bills" {{ old('category', $expense->category) == 'Bills' ? 'selected' : '' }}>Bills</option>
                            <option value="Other" {{ old('category', $expense->category) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('category')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                <div class="form-group">
                    <label class="form-label" for="date">Date</label>
                    <input id="date" name="date" type="date" class="form-input" value="{{ old('date', $expense->date) }}" required>
                    @error('date')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-actions">
                    <a class="btn btn-primary" href="{{ route('expenses.index') }}" >&#8592; Back to Expenses</a>
                    <button type="submit" class="btn btn-primary">
                        <svg width="17" height="18" fill="none" stroke="currentColor" viewBox="0 0 15 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                        Update Expense
                    </button>
                </div>
            </form>
        </div>
@endsection
