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

        <h1 class="text-md text-xl sm:text-3xl font-semibold text-gray-500">Manage Personal Expenses</h1>

        <ul class="flex justify-center items-center space-x-2">
            @auth
                <li class="text-gray-600">

                    <span class="font-bold text-gray-700 text-lg ml-2 mr-2">
                        {{ auth()->user()->name }}
                    </span>
                </li>
                <span> | </span>
                <form action="{{ route('logout.user') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-blue-500">Logout</button>
                </form>
            @else
                <li><a href="{{ route('register.user') }}" class="text-gray-600 hover:text-blue-500">Register</a></li>
                <span> | </span>
                <li><a href="{{ route('login.user') }}" class="text-gray-600 hover:text-blue-500">Login</a></li>
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
