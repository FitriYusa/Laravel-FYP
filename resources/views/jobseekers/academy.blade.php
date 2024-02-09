@extends('layouts.pagelayout')

@section('content')

    {{-- Topbar --}}
    <nav class="navbar">
        <ul >
            <li><a href="">F L E X W A V E S</a></li>

            @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/') }}" >Home</a></li>
                <li><a href="{{ url('/jobseekers/findjob') }}">Find Jobs</a></li>
                <li><a href="{{ url('/jobseekers/profile') }}">Profile</a></li>
                <li><a href="{{ url('chat') }}" >Message</a></li>
                <li><a href="{{ url('/dashboard') }}" >Dashboard</a></li>
            @else
                <li><a href="{{ url('login') }}" >Login</a></li>

                @if (Route::has('register'))
                    <li><a href="{{ url('register') }}" >Register</a></li>
                @endif
            @endauth
            @endif
        </ul>
    </nav>

    <div class="header">
        <h1>Find your <span class="highlight">dream academy</span></h1>
        <br>
        <br>
        <br>
        
        <div class="search-inputs-academy">
          <input type="text" placeholder="Search Academy" class="job-input">
          <button class="search-button">Search</button>
        </div>
        
      </div>
      <br>
      <p style="padding-left: 120px; font-size: 35px;"><b>Academies</b></p>
      <div class="company-container">
       
        <div class="company-box">
            <img src="images/companyrandom.png" alt="Company Logo 1">
            <p style="font-size: 40px;">Advanced Web Designs</p>
            <p style="text-align: left; font-size: 20px;">Start making advanced HTML5, CSS<br> and Javascript coding to produce the<br> best quality of websites.</p>
            <button class="search-button">Apply</button>
          </div>
    
        <div class="company-box">
            <img src="images/companyrandom.png" alt="Company Logo 1">
            <p style="font-size: 40px;">Advanced Web Designs</p>
            <p style="text-align: left; font-size: 20px;">Start making advanced HTML5, CSS<br> and Javascript coding to produce the<br> best quality of websites.</p>
            <button class="search-button">Apply</button>
          </div>
    
          <div class="company-box">
            <img src="images/companyrandom.png" alt="Company Logo 1">
            <p style="font-size: 40px;">Advanced Web Designs</p>
            <p style="text-align: left; font-size: 20px;">Start making advanced HTML5, CSS<br> and Javascript coding to produce the<br> best quality of websites.</p>
            <button class="search-button">Apply</button>
          </div>
      </div>
      
      <div class="footer">
        FLEXWAVES
      </div>
@endsection