@extends('layouts.pagelayout')


<body class="antialiased">
        @section('content')
            
            {{-- Topbar --}}
            <nav class="navbar">
                <ul >
                    <li><a href="">F L E X W A V E S</a></li>

                    @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/profile') }}">Profile</a></li>
                        <li><a href="{{ url('chat') }}">Message</a></li>
                        <li><a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                          </a>
                    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </li>
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
                    <a href="{{ url('/findjob') }}" class="search-button">Search Jobs</a></li>
                    <a href="{{ url('/jobseekeracademy') }}" class="search-button">Academy</a></li>
                    <a href="{{ route('applied_items') }}" class="search-button">Applied</a></li>
                </div>
            </div>

            <section class="academy-info">
                <h1>Our Academies</h1>
                <p>Explore a wealth of online courses, workshops, and resources designed to enhance your skills, expand your knowledge, and propel your career forward.</p>

                <div class="row">
                    <div class="academy-col">
                        <h3>Online Courses</h3>
                        <p>Offer a variety of online courses covering topics such as job search strategies, resume writing, interview preparation, career development, and industry-specific skills.</p>
                    </div>
                    <div class="academy-col">
                        <h3>Variety</h3>
                        <p>Broaden your horizons with our comprehensive selection of courses, meticulously crafted to cater to diverse career paths and skill levels. From mastering industry-specific tools to honing leadership abilities, our courses offer practical insights and hands-on learning experiences to help you excel in your professional journey.</p>
                    </div>
                    <div class="academy-col">
                        <h3>Live Webinars and Workshops</h3>
                        <p>Host live webinars and workshops conducted by industry professionals, covering current trends, best practices, and practical skills related to job seeking and career advancement.</p>
                    </div>
                </div>
            </section>

            <div class="footer">
                FLEXWAVES
            </div>

        @endsection
</body>