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
        
      @include('jobseekers.search')
        
    </div>

      <br>
      <p style="padding-left: 120px; font-size: 35px;"><b>Academies</b></p>
      <div class="company-container">
      
      {{-- Academy Card --}}
        <div class="ag-format-container">
          <div class="ag-courses_box">

            @foreach( $academies as $academy)
            <div class="ag-courses_item">
              <a href="#" class="ag-courses-item_link">
                <div class="ag-courses-item_bg"></div>
                <div class="ag-courses-item_title">{{ $academy->title }}</div>
                
                <div class="ag-courses-item_date-box">
                  Type:
                  <span class="ag-courses-item_date">
                    {{ $academy->type }}
                  </span>
                </div>
                <div class="ag-courses-item_date-box">
                  Location:
                  <span class="ag-courses-item_date">
                    {{ $academy->location }}
                  </span>
                </div>
                <div class="ag-courses-item_date-box">
                  Start:
                  <span class="ag-courses-item_date">
                    {{ $academy->start_date }}
                  </span>
                </div>
              </a>
            </div>
            @endforeach
        
          </div>
        </div>

        {{-- END-Academy Card --}}


      </div>

      {{-- Pagination Links --}}

      <p class="pagination-p">Showing academies {{ $academies->firstItem() }} to {{ $academies->lastItem() }}</p>   
      <div class="pagination-links">
        {{ $academies->links() }}
      </div> 
      
      <div class="footer">
        FLEXWAVES
      </div>
@endsection