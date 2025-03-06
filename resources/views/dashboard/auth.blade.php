@extends('layout')

@section('content')
    <h1 class="font-bold text-lg italic"> Welcome to Dashboard</h1>

    @auth
        <p class="italic">You can manage your finances</p>
    @else
        <p class="italic">Please log in to manage your finances</p>
    @endauth

    <div class="grid grid-cols-2 gap-10 mt-8 mb-10 bg-slate-300 p-4 rounded-2xl">

        <div>
            <p>
                <a href="{{ route('incomes.index') }}" class="text-blue-500 hover:underline font-semibold">Incomes</a>
                <br /> $ {{ $totalIncome }}
            </p>
        </div>

        <div>
            <p>
                <a href="{{ route('expenses.index') }}" class="text-blue-500 hover:underline font-semibold">Expenses</a>
                <br /> $ {{ $totalExpenses }}
            </p>
        </div>


        <div class="col-span-2">
            <h2 class="text-xl font-bold">Balance</h2>
            <span class="font-semibold $ {{ $totalIncome - $totalExpenses < 0 ? 'text-red-500' : '' }}">
                {{ $totalIncome - $totalExpenses }}
            </span>
        </div>
    </div>

    <p class="italic">
        Filter incomes and expenses by year. Expenses can be filtered by year, category, or both.
        View your total balance and see the filtered sums of income and expenses based on your selected filters.
    </p>
@endsection
