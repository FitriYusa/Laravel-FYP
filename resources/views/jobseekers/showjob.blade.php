@extends('layouts.pagelayout')

@section('content')

    {{-- Topbar --}}
    <nav class="navbar">
        <ul >
            <li><a href="">F L E X W A V E S</a></li>

            @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/') }}" >Home</a></li>
                <li><a href="{{ url('/findjob') }}">Back</a></li>
                <li><a href="{{ route('applied_items') }}">Applied</a></li>
                <li><a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
              
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </li>
            @else
                <li><a href="{{ url('login') }}" >Login</a></li>

                @if (Route::has('register'))
                    <li><a href="{{ url('register') }}" >Register</a></li>
                @endif
            @endauth
            @endif
        </ul>
    </nav>

    <div class="academy-container">
        <div class="academy-card">
            <div class="academy-card-header">
                <h2 class="academy-title">{{ $job->title }}</h2>
                <p class="academy-location">{{ $job->location }}</p>
            </div><br>
            <div class="academy-card-body">
                <p class="academy-description">{{ $job->description }}</p><br>
                <p class="academy-type">Type : {{ $job->type }}</p>
                <p class="academy-dates">Start Date: {{ $job->start_date }}</p>
                <p class="academy-dates">End Date: {{ $job->end_date }}</p>
                <p class="academy-times">Start Time: {{ $job->start_time }}</p>
                <p class="academy-times">End Time: {{ $job->end_time }}</p>
            </div><br>
            <div class="academy-card-footer">
                <form action="{{ route('apply.job', ['jobId' => $job->id]) }}" method="POST">
                    @csrf
                <button class="apply-button">Apply Now</button>
                </form>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div> 

    <footer class="footer">
        FLEXWAVES
    </footer>