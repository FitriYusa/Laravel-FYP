@extends('layouts.pagelayout')

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
      <!-- Sidebar -->
      @include('admin.sidebar')
      <!-- End of Sidebar -->
  
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
  
          <!-- Main Content -->
          <div id="content">
      
              <!-- Topbar -->
              @include('admin.topbar')
              <!-- End of Topbar -->
      
              <!-- Begin Page Content -->
              <div class="container-fluid">

                <div class="max-w-md mx-auto p-8 bg-white rounded-md shadow-md">
                    <h2 class="text-2xl font-semibold mb-6">Edit Academy</h2>

                  <!-- Content Row -->
                  <div class="row">
                    <form action="{{ route('academy.update', ['AcademyId' => $academy->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                      <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                        <input type="text" id="title" name="title" value="{{ $academy->title }}" required
                          class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                      </div>
                  
                      <div class="mb-6">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                        <textarea id="description" name="description" required
                          class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">{{ $academy->description }}</textarea>
                      </div>
                      
                      <div class="mb-4">
                        <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                        <input type="text" id="location" name="location" value="{{ $academy->location }}"
                          class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                      </div>
                  
                      <div class="mb-4">
                        <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type:</label>
                        <input type="text" id="type" name="type" value="{{ $academy->type }}"
                          class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                      </div>
                  
                      <div class="mb-4">
                        <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" value="{{ $academy->start_date }}"
                          class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                      </div>
                  
                      <div class="mb-4">
                        <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">End Date:</label>
                        <input type="date" id="end_date" name="end_date" value="{{ $academy->end_date }}"
                          class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                      </div>
                  
                      <div class="mb-4">
                        <label for="start_time" class="block text-gray-700 text-sm font-bold mb-2">Start Time:</label>
                        <input type="time" id="start_time" name="start_time" value="{{ $academy->start_time }}"
                          class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                      </div>
                  
                      <div class="mb-4">
                        <label for="end_time" class="block text-gray-700 text-sm font-bold mb-2">End Time:</label>
                        <input type="time" id="end_time" name="end_time" value="{{ $academy->end_time }}"
                          class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                      </div>
                      
                      <div class="mb-4">
                        <label for="is_active" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                        <select id="is_active" name="is_active" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                            <option value="1" {{ $academy->is_active ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$academy->is_active ? 'selected' : '' }}>Inactive</option>
                        </select><br><br>
                      </div>
                  
                      <button type="submit"
                        class="bg-violet-500 border-solid border-2 border-black text-black px-4 py-2 rounded-md hover:bg-violet-500 hover:text-white focus:outline-none focus:shadow-outline-blue">
                        Update Academy
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
                </div>
              </div>
              
               <!-- Footer -->
               @include('layouts.footer')
               <!-- End of Footer -->
          </div>
      </div>
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>
</html>