@extends('layouts.pagelayout')

@section('content')

    {{-- Topbar --}}
    <nav class="navbar">
        <ul >
            <li><a href="">F L E X W A V E S</a></li>

            @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/jobseekeracademy') }}">Academy</a></li>
                <li><a href="{{ route('applied_items') }}">Applied</a></li>
                <li><a href="{{ url('/profile') }}">Profile</a></li>
                <li><a href="{{ url('chat') }}" >Message</a></li>
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



{{-- 
    <div>
    <!--job_list.blade.php -->

    @foreach ($jobs as $job)
    <div>
        <h4>{{ $job->title }}</h4>
        <p>Description: {{ $job->description }}</p>
        <!-- Other job details -->
        @if (!$job->isAppliedByUser(auth()->user()))
            <form action="{{ route('apply.job', $job->id) }}" method="POST">
                @csrf
                <button type="submit">Apply</button>
            </form>
        @else
            <p>You have already applied for this job.</p>
        @endif
    </div>
    @endforeach
    </div> --}}

    <div class="header">
        <h1>Finding Jobs <span class="highlight">Made Easier</span></h1>
        <br>
        <br>
        <br>
        
        <form method="get" action="{{ route('jobseekers.findjob') }}">
          <div class="search-inputs-academy">
            <input name ="query" type="text" value="{{ $query ?? '' }}" placeholder="Search For Jobs" class="job-input">
            <button class="search-button">Search</button>
          </div>
        </form>
     </div>

     <!-- START OF CARD-->
     <br>
     @foreach($jobs as $job)
     <div>
        <div class="container mx-auto">
            <div class="group bg-gray-100 p-4 pl-10 transition-all duration-300 hover:bg-cyan-900 hover:border-none lg:p-8 rounded-3xl border-solid border-2 border-gray-600 shadow-2xl">
              <div class="flex items-center gap-x-2">
                <img class="aspect-[2/2] w-16" src="https://img.icons8.com/fluency/48/null/mac-os.png" />
                <div>
                    @if($job->company)
                    <h3 class="text-xl font-bold text-neutral-950 group-hover:text-gray-50">{{ optional($job->company)->name }}</h3>
                @else
                    <h3 class="text-xl font-bold text-neutral-950 group-hover:text-gray-50">No Company</h3>
                @endif
                  <span class="text-xs font-bold text-gray-700 group-hover:text-gray-300">{{$job->location}}</span>
                </div>
                {{-- Inspect the company relationship --}}
    {{-- @dd($job->company) --}}
              </div>
              <div class="my-4">
                <h3 class="text-2xl font-medium text-black group-hover:text-gray-200">{{$job->title}}</h3>
                <div class="text-sm font-medium">
                  <span class="m-1 ml-0 inline-block text-blue-500">HTML</span>
                  {{-- <span class="m-1 ml-0 inline-block text-yellow-500">CSS</span>
                  <span class="m-1 ml-0 inline-block text-pink-500">FIGMA</span>
                  <span class="m-1 ml-0 inline-block text-lime-500">Ad. XD</span>
                  <span class="m-1 ml-0 inline-block text-blue-500">Illustrator</span> --}}
                </div>
                <div class="mt-2 text-sm text-gray-700 group-hover:text-gray-100">RM {{$job->salary}}</div>
              </div>
              <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-gray-750 group-hover:text-gray-50">{{$job->type}}</span>
                <a href="{{ url('/findjob/' . $job->id) }}')}}" class="group-hover:text-blue-70 font-medium text-blue-500 transition-all duration-300 pr-5 cursor-pointer">Apply Now</a>
              </div>
            </div>
          </div>
          <br>
     @endforeach

     <div class="flex justify-center p-5">
        {{ $jobs->links('pagination::tailwind') }}
      </div>
    <!-- END OF CARD-->

    <footer class="footer">
        FLEXWAVES
    </footer>

@endsection