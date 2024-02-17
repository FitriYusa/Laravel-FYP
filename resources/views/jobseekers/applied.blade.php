<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Applied Items</title>
</head>
<body>
    <!-- Display applied academies -->
    <h2>Applied Academies:</h2>
    <ul>
        @forelse($appliedAcademies as $academyApply)
            <li>{{ $academyApply->academy->title }}</li>
        @empty
            <li>No applied academies found.</li>
        @endforelse
    </ul>


    <!-- Display applied jobs -->
    <h2>Applied Jobs:</h2>
    <ul>
        @forelse($appliedJobs as $appliedJob)
        <li>{{ $appliedJob->job->title }}</li>
        <li>{{ $appliedJob->apply_status }}</li>
        @empty
        <li>No applied jobs found.</li>
        @endforelse
    </ul>

    <h2>Debugging Data:</h2>
    <pre>
        Applied Academies: {{ $appliedAcademies }}
        Applied Jobs: {{ $appliedJobs }}
    </pre>
    {{-- <!-- Debugging information -->
    <h3>Debugging Information:</h3>
    <pre>
        Applied Academies: {{ $appliedAcademies->isEmpty() ? 'No data' : $appliedAcademies->count() . ' items' }}
        Applied Jobs: {{ $appliedJobs->isEmpty() ? 'No data' : $appliedJobs->count() . ' items' }}
    </pre> --}}
</body>
</html>
