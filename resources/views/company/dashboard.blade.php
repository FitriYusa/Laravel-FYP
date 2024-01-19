@extends('layouts.pagelayout')

@section('content')
    <div class="center">
        <p class="leading-text" style="font-weight: 700">
            Company Dashboard
        </p>
        <ul>
            <li class="list"><a href="/company/profile">Company Profile</a></li>
            <li class="list"><a href="/company/listing">Company Job Listings</a></li>
            <li class="list"><a href="/company/applicant">Company Applicants</a></li>
        </ul>
    </div>
@endsection