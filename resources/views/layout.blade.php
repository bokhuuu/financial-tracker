<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Manage Personal Expenses</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body class="flex justify-center mt-10 bg-gray-300">
    <div class="text-center p-3 bg-white rounded-lg w-[90%] sm:max-w-md md:max-w-lg lg:max-w-xl">

        <h1 class="text-md text-2xl sm:text-3xl mb-3 mt-4 text-blue-400
            hover:font-extrabold">
            <a href="{{ route('dashboard') }}"><strong>Manage Expenses</strong></a>
        </h1>

        <ul class="flex justify-between items-center pl-2 pr-5 pt-3">
            @auth
                <li class="text-gray-600">

                    <span class="font-bold text-gray-700 text-sm">
                        {{ auth()->user()->name }}
                    </span>
                </li>
                <form action="{{ route('logout.user') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-blue-500 hover:underline font-semibold">Logout</button>
                </form>
            @else
                <li><a href="{{ route('register.user') }}" class="text-blue-500 hover:underline font-semibold">Register</a>
                </li>
                <li><a href="{{ route('login.user') }}" class="text-blue-500 hover:underline font-semibold">Login</a></li>
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

        <div class="mt-8 bg-slate-200 p-4">
            @yield('content')
        </div>
    </div>

</body>

</html>
