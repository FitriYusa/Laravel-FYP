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
              <h1 class="h3 mb-0 text-gray-800">Academy</h1>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Academy List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                             
                    <a href="{{ route('academy.create') }}" class="btn btn-primary btn-circle">
                      <i class="fa-solid fa-square-plus fa-3x"></i>
                    </a>
                      <p>Add Academy</p>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                {{-- <th>Image</th> --}}
                                <th>Location</th>
                                <th>Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                      <tbody>
                        @foreach($academies as $academy)
                          <tr>
                            <td>{{ $academy->title }}</td>
                            <td>{{ $academy->description }}</td>
                            {{-- <td><img src="{{ asset($post->image) }}" alt="Post Image"></td> --}}
                            <td>{{ $academy->location }}</td>
                            <td>{{ $academy->type }}</td>
                            <td>{{ $academy->start_date }}</td>
                            <td>{{ $academy->end_date }}</td>
                            <td>{{ $academy->start_time }}</td>
                            <td>{{ $academy->end_time }}</td>
                            <td>
                                @if($academy->is_active)
                                    Open
                                @else
                                    Closed
                                @endif
                            </td>
                            <td>
                              <a href="{{ route('academy.edit', ['AcademyId' => $academy->id]) }}" class="btn btn-primary btn-circle">
                                  <i class="fas fa-edit"></i>
                              </a>
                              @if (session('success'))
                                  <script>
                                      // Display the alert message
                                      alert('{{ session('success') }}');
                                      // Remove the success message from the session to prevent displaying it again
                                      {{ session()->forget('success') }}
                                  </script>
                              @endif
                              <form action="{{ route('academy.delete', ['AcademyId' => $academy->id]) }}" method="post">
                                  @csrf
                                  @method('DELETE') 
                                  <button type="submit" class="btn btn-danger btn-circle">
                                      <i class="fas fa-trash"></i>
                                  </button>
                              </form>
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div> 
        <!-- End of Page Content --><!-- /.container-fluid -->

      </div> 
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