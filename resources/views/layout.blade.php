<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Financial Tracker</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body class="flex justify-center mt-10 bg-gray-300">
    <div class="text-center p-3 bg-white rounded-lg w-[90%] sm:max-w-md md:max-w-lg lg:max-w-xl">

        <h1 class="text-md text-2xl sm:text-3xl mb-3 mt-4 text-gray-700">
            <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline font-semibold">
                <strong>Financial Tracker</strong></a>
            <hr class="border-t-4 bg-slate-300 my-3 rounded-4xl">

        </h1>

        <ul class="flex justify-between items-center pr-5 pt-3">
            @auth
                <li class="text-gray-600 text-start">
                    <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline font-bold">
                        {{ auth()->user()->name }}
                    </a>
                </li>

                <form action="{{ route('logout.user') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-blue-500 hover:underline font-bold">Logout</button>
                </form>
            @else
                <li><a href="{{ route('register.user') }}" class="text-blue-500 hover:underline font-bold">Register</a>
                </li>
                <li><a href="{{ route('login.user') }}" class="text-blue-500 hover:underline font-bold">Login</a></li>
            @endauth
        </ul>
        </nav>

        @if (session('success'))
            <div class="bg-green-200 p-2 mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-200 p-2 mt-3">
                {{ session('error') }}
            </div>
        @endif

        <div class="mt-5 bg-slate-200 p-4">
            @yield('content')
        </div>
    </div>

</body>

</html>
