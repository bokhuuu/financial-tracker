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
            <p><span class="border-slate-500 text-xl font-bold">Incomes</span>
                <br /> 0.00
            </p>
        </div>

        <div>
            <p><span class="border-slate-500 text-xl font-bold">Expenses</span>
                <br /> 0.00
            </p>
        </div>


        <div>
            <p><span class="border-slate-500 text-xl font-bold">Balance</span>
                <br /> 0.00
            </p>
        </div>

        <div>
            <p><span class="border-slate-500 text-xl font-bold">PiggyBank</span>
                <br /> 0.00
            </p>
        </div>
    </div>

    <p class="italic">
        View your incomes and expenses, along with your financial overview.
        The Balance reflects your real-time active funds, while the Bank shows your accumulated savings.
    </p>
@endsection
