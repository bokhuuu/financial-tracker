    @extends('layout')

    @section('content')
        <div class="form-container">
            <form method="POST" action="{{ route('register.user') }}">
                @csrf

                <div class="form-group">
                    <input type="text" name="name" placeholder="Name" required value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-300 mt-1 text-left">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-300 mt-1 text-left">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                    @error('password')
                        <div class="text-red-300 mt-1 text-left">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    @error('password_confirmation')
                        <div class="text-red-300 mt-1 text-left">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="text-blue-500 hover:font-extrabold font-semibold">Register</button>
            </form>
        </div>
    @endsection
