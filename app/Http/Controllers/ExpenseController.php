<?php

namespace App\Http\Controllers;

use App\Mail\HighExpenseNotification;
use App\Models\Category;
use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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


    public function create()
    {
        $categories = Category::all();
        return view('expenses.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string|min:5|max:255',
            'savings_percentage' => 'nullable|in:0,1,5,10'
        ]);

        $expenseAmount = $request->amount;
        $savings = $request->savings_percentage ? ($expenseAmount * $request->savings_percentage) / 100 : 0;
        $totalDeductionAmount = $expenseAmount + $savings;

        $totalIncome = Income::where('user_id', Auth::id())->sum('amount');
        $totalExpense = Expense::where('user_id', Auth::id())->sum('amount');
        $availableBalance = $totalIncome - $totalExpense;

        if ($totalDeductionAmount > $availableBalance) {
            return redirect()->route('expenses.create')
                ->with('error', "Not enough balance! Available: " . number_format($availableBalance, 2))
                ->withInput();
        }

        Expense::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'amount' => $expenseAmount,
            'date' => $request->date,
            'description' => $request->description,
            'savings' => $savings
        ]);

        if ($expenseAmount > 1000) {
            Mail::to(Auth::user()->email)->send(new HighExpenseNotification(Auth::user(), $expenseAmount, $savings));
        }

        return redirect()->route('expenses.index')
            ->with('success', 'Expense added successfully');
    }


    public function destroy(Expense $expense)
    {
        $deletedSavings = $expense->savings;
        $expense->delete();

        $message = $deletedSavings > 0
            ? "Expense deleted. Note: $deletedSavings was also deducted from your Piggy Bank."
            : "Expense deleted.";

        return redirect()->route('expenses.index')
            ->with('success', $message);
    }
}
