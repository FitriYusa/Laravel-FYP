@extends('layouts.pagelayout')

@section('content')

    {{-- Topbar --}}
    <nav class="navbar">
        <ul >
            <li><a href="">F L E X W A V E S</a></li>

            @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/') }}" >Home</a></li>
                <li><a href="{{ url('/findjob') }}">Find Jobs</a></li>
                <li><a href="{{ url('/profile') }}">Profile</a></li>
                <li><a href="{{ url('chat') }}" >Message</a></li>
                <li><a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form></li>
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
        
            {{-- <div class="ag-courses_item">
              <a href="#" class="ag-courses-item_link">
                <div class="ag-courses-item_bg"></div>
        
                <div class="ag-courses-item_title">
                  UX/UI Web-Design&#160;+ Mobile Design
                </div>
        
                <div class="ag-courses-item_date-box">
                  Start:
                  <span class="ag-courses-item_date">
                    04.11.2022
                  </span>
                </div>
              </a>
            </div>
        
            <div class="ag-courses_item">
              <a href="#" class="ag-courses-item_link">
                <div class="ag-courses-item_bg"></div>
        
                <div class="ag-courses-item_title">
                  Annual package "Product+UX/UI+Graph designer&#160;2022"
                </div>
        
                <div class="ag-courses-item_date-box">
                  Start:
                  <span class="ag-courses-item_date">
                    04.11.2022
                  </span>
                </div>
              </a>
            </div>
        
            <div class="ag-courses_item">
              <a href="#" class="ag-courses-item_link">
                <div class="ag-courses-item_bg"></div>
        
                <div class="ag-courses-item_title">
                  Graphic Design
                </div>
        
                <div class="ag-courses-item_date-box">
                  Start:
                  <span class="ag-courses-item_date">
                    04.11.2022
                  </span>
                </div>
              </a>
            </div>
        
            <div class="ag-courses_item">
              <a href="#" class="ag-courses-item_link">
                <div class="ag-courses-item_bg"></div>
        
                <div class="ag-courses-item_title">
                  Motion Design
                </div>
        
                <div class="ag-courses-item_date-box">
                  Start:
                  <span class="ag-courses-item_date">
                    30.11.2022
                  </span>
                </div>
              </a>
            </div>
        
            <div class="ag-courses_item">
              <a href="#" class="ag-courses-item_link">
                <div class="ag-courses-item_bg"></div>
        
                <div class="ag-courses-item_title">
                  Front-end development&#160;+ jQuery&#160;+ CMS
                </div>
              </a>
            </div>
        
            <div class="ag-courses_item">
              <a href="#" class="ag-courses-item_link">
                <div class="ag-courses-item_bg">
                </div>
                <div class="ag-courses-item_title">
                  Digital Marketing
                </div>
              </a>
            </div>
        
            <div class="ag-courses_item">
              <a href="#" class="ag-courses-item_link">
                <div class="ag-courses-item_bg"></div>
        
                <div class="ag-courses-item_title">
                  Interior Design
                </div>
        
                <div class="ag-courses-item_date-box">
                  Start:
                  <span class="ag-courses-item_date">
                    31.10.2022
                  </span>
                </div>
              </a>
            </div> --}}
        
          </div>
        </div>

        {{-- END-Academy Card --}}

        {{-- @foreach($academies->chunk(3) as $row)
            <div class="company-row">
                @foreach($row as $academy)
                <div class="company-box">
                    <img src="images/companyrandom.png" alt="Company Logo 1"> 
                    <p style="font-size: 40px;">{{ $academy->title }}</p>
                    <p style="text-align: left; font-size: 20px;">{{ $academy->description }}</p>
                    <button class="search-button">Apply</button>
                </div>
                @endforeach
            </div>
        @endforeach --}}

    </div>
    
        {{-- <div class="company-box">
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
          </div> --}}
      </div>
      
      <div class="footer">
        FLEXWAVES
      </div>
@endsection