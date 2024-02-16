@extends('layouts.pagelayout')

@section('content')
    <div class="center">
        <p class="leading-text" style="font-weight: 700">
            Find Jobs Page
        </p>
        <ul>
            <li class="list"><a href="/academy">Academy</a></li>
            <li class="list"><a href="/landing">Landing Page</a></li>
            <li class="list"><a href="/profile">Profile</a></li>
        </ul>
    </nav>


    <div>
    <!-- job_list.blade.php -->

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
    </div>
@endsection