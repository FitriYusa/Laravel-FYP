@extends('layouts.pagelayout')


<body class="antialiased">
    

        @section('content')
                <div class="center">
                    <div class='logo-container'>
                    <p class="leading-text" style="font-weight: 700">
                        Flexwaves
                    </p>
                    </div>
                    <ul>
                        <li class="list"><a href="/academy">Academy</a></li>
                        <li class="list"><a href="/findjob">Find Jobs</a></li>
                        <li class="list"><a href="/profile">Profile</a></li>
                    </ul>
                </div> 

            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
                </div>
            @endif
        @endsection
    </div>
</body>