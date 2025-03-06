@extends('layout')

@section('content')
    <h1 class="font-bold text-lg italic"> Welcome to Dashboard</h1>

    @auth
        <p class="italic">You are logged in to manage your finances</p>
    @else
        <p class="italic">Please log in to manage your finances</p>
    @endauth

    <div class="grid grid-cols-2 gap-10 mt-8 mb-10 bg-slate-300 p-4 rounded-2xl">

        <div>
            <p><span class=" border-slate-500 font-semibold">Incomes</span>
                <br /> $ 0.00
            </p>
        </div>

        <div>
            <p><span class=" border-slate-500 font-semibold">Expenses</span>
                <br /> $ 0.00
            </p>
        </div>


        <div class="col-span-2">
            <p><span class=" border-slate-500 font-semibold">Balance</span>
                <br /> $ 0.00
            </p>
        </div>
    </div>

    <h1 class="m"></h1>
    <p class="italic">
        Filter incomes and expenses by year. Expenses can be filtered by year, category, or both.
        View your total balance and see the filtered sums of income and expenses based on your selected filters.
    </p>
@endsection
