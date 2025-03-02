<p class="">{{ $category->name }}</p>

@foreach ($expenses as $expense)
    <p>{{ $expense->amount }}</p>
@endforeach
