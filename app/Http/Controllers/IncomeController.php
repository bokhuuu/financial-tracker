<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{

    public function index(Request $request)
    {
        $query = Income::query();

        if ($request->has('month') && $request->has('year')) {
            $query->whereMonth('date', $request->month)
                ->whereYear('date', $request->year);
        } elseif ($request->has('year')) {
            $query->whereYear('date', $request->year);
        }

        $incomes = $query->limit(5)->get();
        $filteredTotalIncome = $incomes->sum('amount');
        $totalIncome = Income::sum('amount');

        return view('incomes.index', compact('incomes', 'filteredTotalIncome', 'totalIncome'));
    }


    public function create()
    {
        return view('incomes.create');
    }


    public function store(Request $request)
    {
        $request->validate();
    }


    public function edit(Income $income)
    {
        return view('incomes.edit', compact('income'));
    }


    public function update(Request $request, Income $income)
    {
        //
    }


    public function destroy(Income $income)
    {
        //
    }
}
