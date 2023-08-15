<?php

include 'koneksi.php';

error_reporting(0);
session_start();

if (isset($_SESSION['sebagai'])) {
  if ($_SESSION['sebagai'] == 'karyawan') {
    header("Location: login/karyawan.php");
  }
}

if (isset($_POST['btn-login'])) {
  $alamat_email = $_POST['alamat_email'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM login WHERE alamat_email='$alamat_email' and password='$password'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) === 1) {
    $_SESSION['alamat_email'] = true;
    $rows = mysqli_fetch_assoc($result);
    if ($rows['sebagai'] == 'karyawan') {
      $_SESSION['sebagai'] = $rows['sebagai'];
      $_SESSION['nama_lengkap'] = $rows['nama_lengkap'];
      // $_SESSION['id'] = $rows['password'];
      return header("Location: login/karyawan.php");


      if (isset($_SESSION['alamat_email'])) {
        header("Location: login/karyawan.php");
        exit;
      }
    }
  } else {
    echo "<script>alert('alamat_email atau password Anda salah. Silahkan coba lagi!')</script>";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Homepage</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div>
               <img src="assets/img/mitra.png" alt="logo" width="45px">
                </div>
               
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

        

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola Data</h6>
                        <a class="collapse-item" href="../siswa/admin.php">Kelola Data Siswa</a>
                    </div>
                </div>
            </li>

            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray"></i>
                    <span>Login Admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                    

                        <li class="nav-item dropdown no-arrow mx-1">
                                <a href="login.php" class="nav-link dropdown-toggle "><i
                                class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>Login/Register</a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama_lengkap']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a href="login.php" class="dropdown-item" >
                                    <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Login
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->            

                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <br>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
                    </div>
                    <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="col-lg-6 mb-4">

                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                        src="assets/img/car_755x430.png" alt="...">
                                </div>
                                <p>Add some quality, svg illustrations to your project courtesy of <a
                                        target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                    constantly updated collection of beautiful svg images that you can use
                                    completely free and without attribution!</p>
                                <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                    unDraw &rarr;</a>
                            </div>
                        </div>

                        <!-- Approach -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                            </div>
                            <div class="card-body">
                                <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                    CSS bloat and poor page performance. Custom CSS classes are used to create
                                    custom components and custom utility classes.</p>
                                <p class="mb-0">Before working with this theme, you should become familiar with the
                                    Bootstrap framework, especially the utility classes.</p>
                            </div>
                        </div>

                        </div>

                </div>

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>

<script>
  $(document).on('click','#login', function(){

    var response = grecaptcha.getResponse();
    if(response.length==0)
    {
      alert("Please verify you are not robot");
      return false;
    }
  });
</script>
