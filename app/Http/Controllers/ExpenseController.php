<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{

    public function index(Request $request)
    {
        $query = Expense::where('user_id', Auth::id());

        if ($request->filled('year')) {
            $query->whereYear('date', $request->year);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $expenses = $query->get();
        $filteredTotalExpense = $expenses->sum('amount');
        $totalExpense = Expense::where('user_id', Auth::id())->sum('amount');
        $categories = Category::all();

        return view('expenses.index', compact('expenses', 'filteredTotalExpense', 'totalExpense', 'categories'));
    }


    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted');
    }
}
