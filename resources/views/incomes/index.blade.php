@extends('layout')

@section('content')
    <h2 class="text-xl font-bold">Incomes</h2>

    @auth
        <p class="italic">Manage your incomes</p>
    @else
        <p class="italic">Please log in to manage your incomes</p>
    @endauth

    <form method="GET" action="{{ route('incomes.index') }}" class="mb-4 mt-4 bg-gray-300 p-2 font-thin rounded-xl">
        <div class="w-full">
            <label for="year" class="block mb-1 font-thin text-left">By Year:</label>
            <select name="year" id="year" class="p-1 rounded-lg w-full">
                <option value="">All</option>
                @foreach (range(date('Y'), 2015) as $year)
                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>

            <div class="flex justify-between items-center">
                <button type="submit"
                    class="bg-blue-400 text-white mt-3 mb-1 font-semibold w-12 h-12 
                    rounded-full flex items-center justify-center hover:bg-blue-300">
                    Filter
                </button>
                @auth
                    <a href="{{ route('incomes.create') }}"
                        class="bg-blue-400 text-white mt-3 mb-1 font-semibold w-12 h-12 
                        rounded-full flex items-center justify-center hover:bg-blue-300">
                        Add
                    </a>
                @endauth
            </div>
        </div>
    </form>

    <div class="text-left space-y-3">
        @foreach ($incomes as $income)
            <li class="flex justify-between items-center">
                {{ $income->description }} <br /> $ {{ $income->amount }}
                <form action="{{ route('incomes.destroy', $income) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500 hover:underline font-semibold">Delete</button>
                </form>
            </li>
        @endforeach

        <div class="mt-5 bg  bg-gray-300 font-bold flex justify-center p-2 rounded-xl">
            <span class="font-thin mr-3">
                Sum of Incomes:
            </span> $
            {{ number_format($filteredTotalIncome, 2) }}
        </div>
    </div>

    </div>
@endsection
