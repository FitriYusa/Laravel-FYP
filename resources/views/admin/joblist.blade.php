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
                        <h1 class="h3 mb-0 text-gray-800">JOB</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Job List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Location</th>
                                            <th>Type</th>
                                            <th>Salary</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jobList as $job)
                                            <tr>
                                                <td>{{ $job->title }}</td>
                                                <td>{{ $job->description }}</td>
                                                <td>{{ $job->location }}</td>
                                                <td>{{ $job->type }}</td>
                                                <td>{{ $job->salary }}</td>
                                                <td>{{ $job->start_date }}</td>
                                                <td>{{ $job->end_date }}</td>
                                                <td>{{ $job->start_time }}</td>
                                                <td>{{ $job->end_time }}</td>
                                                <td>
                                                    @if($job->is_active)
                                                        Open
                                                    @else
                                                        Closed
                                                    @endif
                                                </td>
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
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/datatables-demo.js"></script>

</body>
</html>