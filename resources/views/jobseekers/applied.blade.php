@extends('layouts.pagelayout')

@section('content')
    {{-- Topbar --}}
    <nav class="navbar">
        <ul >
            <li><a href="">F L E X W A V E S</a></li>

            @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/') }}" >Home</a></li>
                <li><a href="{{ url()->previous() }}">Back</a></li>
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

        <!-- Display applied academies -->
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-10">
              <div>
                <h2 class="text-2xl font-semibold leading-tight">Academies Applied:</h2>
              </div>
              <div class="-mx-4 overflow-x-auto px-4 py-4 sm:-mx-8 sm:px-8">
                <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                  <table class="min-w-full leading-normal">
                    <thead>
                      <tr>
                        <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Applied Academies</th>
                        <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Status</th>
                      </tr>
                    </thead>
                    @forelse($appliedAcademies as $academyApply)
                        <tbody>
                        <tr>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                            <p class="whitespace-no-wrap text-gray-900">{{ $academyApply->academy->title }}</p>
                            </td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                @if ($academyApply->apply_status == 'pending')
                                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-orange-900">
                                        <span aria-hidden class="absolute inset-0 rounded-full bg-orange-200 opacity-50"></span>
                                        <span class="relative">{{ $academyApply->apply_status }}</span>
                                    </span>
                                @elseif ($academyApply->apply_status == 'approved')
                                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                        <span aria-hidden class="absolute inset-0 rounded-full bg-green-200 opacity-50"></span>
                                        <span class="relative">{{ $academyApply->apply_status }}</span>
                                    </span>
                                @else
                                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-red-900">
                                        <span aria-hidden class="absolute inset-0 rounded-full bg-red-200 opacity-50"></span>
                                        <span class="relative">{{ $academyApply->apply_status }}</span>
                                    </span>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                        @empty
                        <tbody>
                            <tr>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap text-gray-900">No applied academies found.</p>
                                </td>
                            </tr>
                        </tbody>
                    @endforelse
                  </table>
                </div>
              </div>
            </div>
          </div>

        <!-- Display applied jobs -->
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-6">
              <div>
                <h2 class="text-2xl font-semibold leading-tight">Jobs Applied:</h2>
              </div>
              <div class="-mx-4 overflow-x-auto px-4 py-4 sm:-mx-8 sm:px-8">
                <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                  <table class="min-w-full leading-normal">
                    <thead>
                      <tr>
                        <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Applied Jobs</th>
                        <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Status</th>
                      </tr>
                    </thead>
                    @forelse($appliedJobs as $appliedJob)
                        <tbody>
                        <tr>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                            <p class="whitespace-no-wrap text-gray-900">{{ $appliedJob->job->title }}</p>
                            </td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                @if ($appliedJob->apply_status == 'pending')
                                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-orange-900">
                                        <span aria-hidden class="absolute inset-0 rounded-full bg-orange-200 opacity-50"></span>
                                        <span class="relative">{{ $appliedJob->apply_status }}</span>
                                    </span>
                                @elseif ($appliedJob->apply_status == 'approved')
                                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                        <span aria-hidden class="absolute inset-0 rounded-full bg-green-200 opacity-50"></span>
                                        <span class="relative">{{ $appliedJob->apply_status }}</span>
                                    </span>
                                @else
                                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-red-900">
                                        <span aria-hidden class="absolute inset-0 rounded-full bg-red-200 opacity-50"></span>
                                        <span class="relative">{{ $appliedJob->apply_status }}</span>
                                    </span>
                                @endif
                            </span>
                            </td>
                        </tr>
                        </tbody>
                        @empty
                        <tbody>
                            <tr>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap text-gray-900">No applied jobs found.</p>
                                </td>
                            </tr>
                        </tbody>
                    @endforelse
                  </table>
                </div>
              </div>
            </div>
          </div>

        {{-- <h2>Debugging Data:</h2>
        <pre>
            Applied Academies: {{ $appliedAcademies }}
            Applied Jobs: {{ $appliedJobs }}
        </pre> --}}