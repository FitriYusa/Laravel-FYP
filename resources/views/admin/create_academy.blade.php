@extends('layouts.pagelayout')

    <div class="max-w-md mx-auto p-8 bg-white rounded-md shadow-md">
        <h2 class="text-2xl font-semibold mb-6">Add Academy</h2>
        <form action="{{ route('academy.store') }}" method="POST">
            @csrf
          <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required
              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
          </div>
      
          <div class="mb-6">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
            <textarea id="description" name="description" required
              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">{{ old('description') }}</textarea>
          </div>
          
          <div class="mb-4">
            <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
            <input type="text" id="location" name="location" value="{{ old('location') }}"
              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
          </div>
      
          <div class="mb-4">
            <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type:</label>
            <input type="text" id="type" name="type" value="{{ old('type') }}"
              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
          </div>
      
          <div class="mb-4">
            <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Start Date:</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}"
              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
          </div>
      
          <div class="mb-4">
            <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">End Date:</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}"
              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
          </div>
      
          <div class="mb-4">
            <label for="start_time" class="block text-gray-700 text-sm font-bold mb-2">Start Time:</label>
            <input type="time" id="start_time" name="start_time" value="{{ old('start_time') }}"
              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
          </div>
      
          <div class="mb-4">
            <label for="end_time" class="block text-gray-700 text-sm font-bold mb-2">End Time:</label>
            <input type="time" id="end_time" name="end_time" value="{{ old('end_time') }}"
              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
          </div>
          
          <div class="mb-4">
            <label for="is_active" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
            <select id="is_active" name="is_active" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                  <option value="1" {{ old('is_active') ? 'selected' : '' }}>Active</option>
                  <option value="0" {{ !old('is_active') ? 'selected' : '' }}>Inactive</option>
            </select><br><br>
          </div>
      
          <button type="submit"
            class="bg-violet-500 border-solid border-2 border-black text-black px-4 py-2 rounded-md hover:bg-violet-500 hover:text-white focus:outline-none focus:shadow-outline-blue">
            Add Academy
          </button>
       </form>
      </div>

    @if (session('warning'))
        <script>
        // Display the alert message
        alert('{{ session('warning') }}');
        // Remove the success message from the session to prevent displaying it again
        {{ session()->forget('warning') }}
    </script>
    @endif
