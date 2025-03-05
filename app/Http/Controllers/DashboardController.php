<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        if (Auth::check()) {
            $totalIncome = Income::where('user_id', Auth::id())->sum('amount');
            $totalExpenses = Expense::where('user_id', Auth::id())->sum('amount');

            return view('dashboard.auth', compact('totalIncome', 'totalExpenses'));
        } else {
            return view('dashboard.guest');
        }
    }
}
