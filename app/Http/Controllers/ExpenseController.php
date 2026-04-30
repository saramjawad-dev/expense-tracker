<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    
    public function index()
    {
        $expenses = Expense::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('expenses.index', compact('expenses'));
    }

    
    public function create()
    {
        return view('expenses.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required',
            'amount'   => 'required|numeric',
            'category' => 'required',
            'date'     => 'required|date',
        ]);

        Expense::create([
            'user_id' => Auth::id(),
            'title'   => $request->title,
            'amount'  => $request->amount,
            'category'=> $request->category,
            'date'    => $request->date,
        ]);

        return redirect()
            ->route('expenses.index')
            ->with('success', 'Expense Added Successfully');
    }

    
    public function edit(Expense $expense)
    {
        if ($expense->user_id !== Auth::id()) {
            abort(403);
        }

        return view('expenses.edit', compact('expense'));
    }

    
    public function update(Request $request, Expense $expense)
    {
        if ($expense->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title'    => 'required',
            'amount'   => 'required|numeric',
            'category' => 'required',
            'date'     => 'required|date',
        ]);

        $expense->update([
            'title'    => $request->title,
            'amount'   => $request->amount,
            'category' => $request->category,
            'date'     => $request->date,
        ]);

        return redirect()
            ->route('expenses.index')
            ->with('success', 'Expense Updated Successfully');
    }

    
    public function destroy(Expense $expense)
    {
        if ($expense->user_id !== Auth::id()) {
            abort(403);
        }

        $expense->delete();

        return redirect()
            ->route('expenses.index')
            ->with('success', 'Expense Deleted Successfully');
    }
}