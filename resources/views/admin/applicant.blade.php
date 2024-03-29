<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Company</title>

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
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Applicants</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Applicants List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Apply ID</th>
                                            <th>Applicant Name</th>
                                            <th>Applicant Email</th>
                                            <th>Applicant Resume</th>
                                            <th>Academy Title</th>
                                            <th>Status</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($applies as $apply)
                                            <tr>
                                                <td>{{ $apply->id }}</td>
                                                <td>{{ $apply->user->name }}</td> <!-- Access the name via the user relationship -->
                                                <td>{{ $apply->user->email }}</td> <!-- Access the email via the user relationship -->
                                                <td><a href="{{ asset($apply->user->user_profile) }}" target="_blank">Resume</a></td>
                                                <td>{{ $apply->academy->title }}</td> <!-- Access the title via the academy relationship -->
                                                
                                                <td>
                                                    <!-- Create a form with a dropdown menu for changing the status -->
                                                    <form action="{{ route('updateStatus', $apply->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="status">
                                                            <option value="pending" {{ $apply->apply_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="approved" {{ $apply->apply_status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                            <option value="rejected" {{ $apply->apply_status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                        </select>
                                                        <button type="submit">Update</button>
                                                    </form>
                                                    @if (session('success'))
                                                    <script>
                                                        // Display the alert message
                                                        alert('{{ session('success') }}');
                                                        // Remove the success message from the session to prevent displaying it again
                                                        {{ session()->forget('success') }}
                                                    </script>
                                                @endif
                                                </td>
                                                <!-- Add more table cells for other attributes -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- /.container-fluid -->
                <!-- End of Main Content -->

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