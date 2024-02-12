@extends('layouts.pagelayout')


<body class="antialiased">
        @section('content')
            
            {{-- Topbar --}}
            <nav class="navbar">
                <ul >
                    <li><a href="">F L E X W A V E S</a></li>

                    @if (Route::has('login'))
                    @auth
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

            <div class="header">
                <h1>Find Your Dream Job Today:<br>Explore Opportunities on<br><span class="highlight">Flexwaves</span></h1>
                <br>
                <br>
                <p style="margin-bottom: 50px;">Great platform for job seekers that are searching for<br>new career heights and passionate about startups.</p>
                <div class="search-inputs">
                    <a href="{{ url('/jobseekers/findjob') }}" class="search-button">Search Jobs</a></li>
                    <a href="{{ url('/jobseekers/academy') }}" class="search-button">Academy</a></li>
                </div>
            </div>

            <div class="footer">
                FLEXWAVES
            </div>

        @endsection
</body>