<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function view;

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


    public function destroy(Income $income)
    {
        $income->delete();

        return redirect()->route('incomes.index')->with('success', 'Income deleted');
    }
}
