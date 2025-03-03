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

            <button type="submit">Login</button>
        </form>
    </div>
@endsection
