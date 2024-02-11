<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Add Job</h1>
    <form action="{{ route('job.store') }}" method="POST">
        @csrf
        <!-- Title -->
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required><br>

        <!-- Description -->
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required>{{ old('description') }}</textarea><br>

        <!-- Image -->
        {{-- <label for="image">Image:</label>
        <input type="file" id="image" name="image" value="{{ old('image') }}"><br>       --}}

        <!-- Location -->
        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" value="{{ old('location') }}" ><br>

        <!-- Type -->
        <label for="type">Type:</label><br>
        <input type="text" id="type" name="type" value="{{ old('type') }}" ><br>

        <label for="type">Salary:</label><br>
        <input type="number" id="salary" name="salary" value="{{ old('salary') }}" required><br>

        <!-- Start Date -->
        <label for="start_date">Start Date:</label><br>
        <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" ><br>

        <!-- End Date -->
        <label for="end_date">End Date:</label><br>
        <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" ><br>

        <!-- Start Time -->
        <label for="start_time">Start Time:</label><br>
        <input type="time" id="start_time" name="start_time" value="{{ old('start_time') }}" ><br>

        <!-- End Time -->
        <label for="end_time">End Time:</label><br>
        <input type="time" id="end_time" name="end_time" value="{{ old('end_time') }}" ><br>

        <!-- Status -->
        <label for="is_active">Status:</label><br>
        <select id="is_active" name="is_active">
            <option value="1" {{ old('is_active') ? 'selected' : '' }}>Active</option>
            <option value="0" {{ !old('is_active') ? 'selected' : '' }}>Inactive</option>
        </select><br><br>

        <button type="submit">Add Job</button>
    </form>
    @if (session('warning'))
        <script>
        // Display the alert message
        alert('{{ session('warning') }}');
        // Remove the success message from the session to prevent displaying it again
        {{ session()->forget('warning') }}
    </script>
    @endif
</body>
</html>