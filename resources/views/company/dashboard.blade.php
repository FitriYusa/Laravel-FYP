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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i>
                            Generate Report
                        </a> --}}
                </div>
        
                <!-- Content Row -->
                <div class="row">
                    <!-- Companies Example -->
                    <div class="col-xl-3 col-md-6 mb-4" >
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            No. of Applicant
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jobApplicationsCount}}</div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-auto">
                                        <i class="fas fa-address-book fa-2x text-gray-300"></i>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    
                    <!-- Registered Jobseekers Card -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            No. of Pending Applicants
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pendingApplicantsCount}}</div>
                                    </div>
                                    <!--icon -->
                                    <div class="col-auto">
                                        <i class="fa-solid fa-user-astronaut fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Joblisted Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            No. of jobs
                                        </div>
                                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jobListCount}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>     
                <!-- /.container-fluid -->
                <!-- End of Main Content -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
                </div>
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Pending Applicants</h6>
                  </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                              <th>Applicant Name</th>
                              <th>Applicant Email</th>
                              <th>Job Title</th>
                              <th>Status</th>
                              <!-- Add more table headers as needed -->
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($applications as $apply)
                             @if ($apply->apply_status == 'pending')
                              <tr>
                                  <td>{{ $apply->user->name }}</td> <!-- Access the name via the user relationship -->
                                  <td>{{ $apply->user->email }}</td> <!-- Access the email via the user relationship -->
                                  <td>{{ $apply->job->title }}</td> <!-- Access the title via the academy relationship -->
                                  <td>{{ $apply->apply_status }}</td>
                                  <!-- Add more table cells for other attributes -->
                              </tr>
                            @endif
                          @endforeach
                      </tbody>
                      </table>
                    </div>
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