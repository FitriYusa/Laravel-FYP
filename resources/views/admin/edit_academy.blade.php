<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Academy</h1>
    <form action="{{ route('academy.update', ['AcademyId' => $academy->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{{ $academy->title }}"required><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"required>{{ $academy->description }}</textarea><br>

        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" value="{{ $academy->location }}"><br>

        <label for="type">Type:</label><br>
        <input type="text" id="type" name="type" value="{{ $academy->type }}"><br>

        <label for="start_date">Start Date:</label><br>
        <input type="date" id="start_date" name="start_date" value="{{ $academy->start_date }}"><br>

        <label for="end_date">End Date:</label><br>
        <input type="date" id="end_date" name="end_date" value="{{ $academy->end_date }}"><br>

        <label for="start_time">Start Time:</label><br>
        <input type="time" id="start_time" name="start_time" value="{{ $academy->start_time }}"><br>

        <label for="end_time">End Time:</label><br>
        <input type="time" id="end_time" name="end_time" value="{{ $academy->end_time }}"><br>

        <label for="is_active">Status:</label><br>
        <select id="is_active" name="is_active">
            <option value="1" {{ $academy->is_active ? 'selected' : '' }}>Active</option>
            <option value="0" {{ !$academy->is_active ? 'selected' : '' }}>Inactive</option>
        </select><br><br>

        <button type="submit">Update Academy</button>
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