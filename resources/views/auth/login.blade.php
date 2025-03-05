@extends('layout')

@section('content')
    <div class="form-container">
        <form method="POST" action="{{ route('login.user') }}">
            @csrf

            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="text-blue-500 hover:font-extrabold font-semibold">Login</button>
        </form>
    </div>
@endsection
