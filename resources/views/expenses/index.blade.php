@extends('layout')

@section('content')
    <h2 class="text-xl font-bold mb-3">Expenses</h2>

    <form method="GET" action="{{ route('expenses.index') }}" class="mb-4 bg-gray-300 p-2 font-thin">
        <div class="flex justify-between mb-4">
            <div class="w-1/2 pr-2">
                <label for="year" class="block mb-1 font-thin text-left">By Year:</label>
                <select name="year" id="year" class="p-1 rounded-lg w-full">
                    <option value="">All</option>
                    @foreach (range(date('Y'), 2015) as $year)
                        <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="w-1/2 pl-2">
                <label for="category" class="block mb-1 font-thin text-left">By Category:</label>
                <select name="category_id" id="category" class="p-1 rounded-lg w-full">
                    <option value="">---</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="text-blue-500 hover:underline font-semibold text-center">Filter</button>
    </form>

    <div class="text-left space-y-3">
        @foreach ($expenses as $expense)
            <li class="flex justify-between items-center">
                {{ $expense->description }} <br /> $ {{ $expense->amount }}
                <form action="{{ route('expenses.destroy', $expense) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-400 hover:underline font-semibold">Delete</button>
                </form>
            </li>
        @endforeach

        <div class="mt-5 bg  bg-gray-300 font-bold flex justify-center p-2">
            <span class="font-thin mr-3">
                Sum of Expenses:
            </span> $
            {{ number_format($filteredTotalExpense, 2) }}
        </div>
    </div>

    </div>
@endsection
