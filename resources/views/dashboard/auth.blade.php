@extends('layout')

@section('content')
    <h1 class="font-bold text-lg italic"> Welcome to Dashboard</h1>

    @auth
        <p class="italic">Manage your finances</p>
    @else
        <p class="italic">Please log in to manage your finances</p>
    @endauth

    <div class="grid grid-cols-2 gap-5 mt-8 mb-8 bg-slate-300 p-2 rounded-xl">
        <div>
            <p>
                <a href="{{ route('incomes.index') }}" class="text-blue-500 text-xl font-bold hover:underline">Incomes</a>
                <br /> {{ number_format($totalIncome, 2) }}
            </p>
        </div>

        <div>
            <p>
                <a href="{{ route('expenses.index') }}" class="text-blue-500 text-xl font-bold hover:underline">Expenses</a>
                <br /> {{ number_format($totalExpenses, 2) }}
            </p>
        </div>

        <div>
            <p class="text-xl font-bold">Balance</p>
            <span class="font-semibold">
                {{ number_format($availableBalance, 2) }}
            </span>
        </div>

        <div>
            <p class="text-xl font-bold">PiggyBank</p>
            <span class="font-semibold">
                {{ number_format($savingsBalance, 2) }}
            </span>
        </div>


    </div>

    <p class="italic">
        View your incomes and expenses, along with your financial overview.
        The Balance reflects your real-time active funds, while the Bank shows your accumulated savings.
    </p>
@endsection
