@extends('layout')

@section('content')
    <h2 class="text-xl font-bold">Adding Income</h2>

    @auth
        <p class="italic">Add income</p>
    @else
        <p class="italic">Please log in to add income</p>
    @endauth

    @if (session('success'))
        <p class="text-green-200">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('incomes.store') }}" class="bg-gray-300 p-4 mt-4 rounded-xl">
        @csrf

        <div class="mb-4">
            <label for="amount" class="block font-thin mb-1 text-left">Amount:</label>
            <input type="number" name="amount" id="amount" step="1" min="1" value="{{ old('amount') }}"
                class="w-full p-2 rounded-lg border @error('amount') border-red-500 @enderror">
            @error('amount')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="date" class="block font-thin mb-1 text-left">Date:</label>
            <input type="date" name="date" id="date" value="{{ old('date') }}"
                class="w-full p-2 rounded-lg border @error('date') border-red-500 @enderror">
            @error('date')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block font-thin mb-1 text-left">Description:</label>
            <input type="text" name="description" id="description" value="{{ old('description') }}"
                class="w-full p-2 rounded-lg border @error('description') border-red-500 @enderror">
            @error('description')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        @auth
            <div class="flex justify-center mt-4">
                <button type="submit"
                    class="bg-blue-400 text-white font-semibold w-12 h-12 rounded-full flex items-center justify-center hover:bg-blue-300">
                    Save
                </button>
            </div>
        @endauth
    </form>
@endsection
