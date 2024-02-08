@extends('layouts.pagelayout')


<body class="antialiased">
        @section('content')
            
            {{-- Topbar --}}
            <nav class="navbar">
                <ul >
                    <li><a href="">F L E X W A V E S</a></li>

                    @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/jobseekers/findjob') }}">Find Jobs</a></li>
                        <li><a href="{{ url('/jobseekers/academy') }}">Academy</a></li>
                        <li><a href="{{ url('/jobseekers/profile') }}">Profile</a></li>
                        <li><a href="{{ url('chat') }}">Message</a></li>
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    @else
                        <li><a href="{{ url('login') }}">Login</a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ url('register') }}">Register</a></li>
                        @endif
                    @endauth
                    @endif
                </ul>
            </nav>

        @endsection
    </div>
</body>