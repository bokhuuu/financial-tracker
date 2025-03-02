<ul>
    @foreach ($incomes as $income)
        <li>{{ $income->date }} - ${{ $income->amount }} - {{ $income->description }}</li>
    @endforeach
</ul>

@if (request('month') && request('year'))
    <p>Filtered Total: ${{ $filteredTotalIncome }}</p>
@elseif (request('year'))
    <p>Filtered Total: ${{ $filteredTotalIncome }}</p>
@endif

<p>Total: {{ $totalIncome }}</p>
