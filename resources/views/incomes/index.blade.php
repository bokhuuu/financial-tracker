@extends('layout')

@section('content')
    <h2 class="text-xl font-bold mb-3">Incomes</h2>
    <div>
        <form method="GET" action="{{ route('incomes.index') }}"
            class="mb-4 bg-gray-300 p-2 font-thin flex justify-between items-center">
            <label for="year">Filter by Year:</label>
            <select name="year" id="year" class="p-1 rounded-lg">
                <option value="">All</option>
                @foreach (range(date('Y'), 2015) as $year)
                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="text-blue-500 hover:underline font-semibold text-left">Filter</button>
        </form>
    </div>

    <div class="text-left space-y-3">
        @foreach ($incomes as $income)
            <li class="flex justify-between items-center">
                {{ $income->description }} <br /> $ {{ $income->amount }}
                <form action="{{ route('incomes.destroy', $income) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-400 hover:underline font-semibold">Delete</button>
                </form>
            </li>
        @endforeach

        <div class="mt-5 bg  bg-gray-300 font-bold flex justify-center p-2">
            <span class="font-thin mr-3">
                Sum of Amount:
            </span> $
            {{ number_format($filteredTotalIncome, 2) }}
        </div>
    </div>

    </div>
@endsection
