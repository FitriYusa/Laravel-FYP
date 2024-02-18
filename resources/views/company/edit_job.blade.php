<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Company Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Custom styles for table -->
  <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

  <script src="https://kit.fontawesome.com/6d016c170f.js" crossorigin="anonymous"></script>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

        <!-- Sidebar -->
        @include('company.sidebar')
        <!-- End of Sidebar -->
    
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
    
            <!-- Main Content -->
            <div id="content">
        
                <!-- Topbar -->
                @include('company.topbar')
                <!-- End of Topbar -->
        
                <!-- Begin Page Content -->
                <div class="container-fluid">
        
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Edit Job</h1>
                            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-download fa-sm text-white-50"></i>
                                Generate Report
                            </a> --}}
                    </div>
            
                    <!-- Content Row -->
                    <div class="row">
                        <form action="{{ route('job.update', ['JobId' => $job->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="title">Title:</label><br>
                            <input type="text" id="title" name="title" value="{{ $job->title }}"required><br>
                            
                            <label for="description">Description:</label><br>
                            <textarea id="description" name="description"required>{{ $job->description }}</textarea><br>
                    
                            <label for="location">Location:</label><br>
                            <input type="text" id="location" name="location" value="{{ $job->location }}"><br>
                    
                            <label for="type">Type:</label><br>
                            <input type="text" id="type" name="type" value="{{ $job->type }}"><br>
                    
                            <label for="start_date">Start Date:</label><br>
                            <input type="date" id="start_date" name="start_date" value="{{ $job->start_date }}"><br>
                    
                            <label for="end_date">End Date:</label><br>
                            <input type="date" id="end_date" name="end_date" value="{{ $job->end_date }}"><br>
                    
                            <label for="start_time">Start Time:</label><br>
                            <input type="time" id="start_time" name="start_time" value="{{ $job->start_time }}"><br>
                    
                            <label for="end_time">End Time:</label><br>
                            <input type="time" id="end_time" name="end_time" value="{{ $job->end_time }}"><br>
                    
                            <label for="is_active">Status:</label><br>
                            <select id="is_active" name="is_active">
                                <option value="1" {{ $job->is_active ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$job->is_active ? 'selected' : '' }}>Inactive</option>
                            </select><br><br>
                    
                            <button type="submit">Update Job</button>
                        </form>
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
            <!-- End of Content -->
        
        </div>
        <!-- End of Content Wrapper -->
  
    </div>
    <!-- End of Page Wrapper -->
  
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> 

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>

</body>
</html>