<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">
                Admin
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <hr class="sidebar-divider d-none d-md-block">
            <a class="nav-link" href="company">
                <i class="fas fa-address-book"></i>
                <span>Company</span>
            </a>
            <hr class="sidebar-divider">
            <a class="nav-link" href="jobList">
                <i class="fa-solid fa-school"></i>
                <span>Job List</span>
            </a>
            <hr class="sidebar-divider">
            <a class="nav-link" href="academy">
                <i class="fa-solid fa-school"></i>
                <span>Academy</span>
            </a>
            <hr class="sidebar-divider">
            <a class="nav-link" href="academiess">
                <i class="fa-solid fa-school"></i>
                <span>Academy Applicant</span>
            </a>
            <hr class="sidebar-divider">
            <a class="nav-link" href="{{ url('chat') }}">
                <i class="fas fa-comments"></i>
                
                <span>Message</span>
            </a>
            <hr class="sidebar-divider">
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar --> 
</body>
</html>