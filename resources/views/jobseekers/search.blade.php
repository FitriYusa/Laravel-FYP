<form method="get" action="{{ route('jobseekers.academy') }}">
    <div class="search-inputs-academy">
      <input name ="query" type="text" value="{{ $query ?? '' }}" placeholder="Search Academy" class="job-input">
      <button class="search-button">Search</button>
    </div>
  </form>