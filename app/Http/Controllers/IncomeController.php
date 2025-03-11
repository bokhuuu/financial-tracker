<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{

    public function index(Request $request)
    {
        $query = Income::where('user_id', Auth::id());

        if ($request->filled('year')) {
            $query->whereYear('date', $request->year);
        }

        $incomes = $query->get();
        $filteredTotalIncome = $incomes->sum('amount');
        $totalIncome = Income::where('user_id', Auth::id())->sum('amount');

        return view('incomes.index', compact('incomes', 'filteredTotalIncome', 'totalIncome'));
    }


    public function create()
    {
        return view('incomes.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'date' => 'required|date',
            'description' => 'required|string|min:5|max:255'
        ]);

        Income::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'date' => $request->date,
            'description' => $request->description
        ]);

        return redirect()->route('incomes.index')
            ->with('success', 'Income added');
    }


    public function destroy(Income $income)
    {
        $income->delete();

        return redirect()->route('incomes.index')->with('success', 'Income deleted');
    }
}
