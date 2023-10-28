<?php
include('../../koneksi.php');

if (isset($_GET['id_permintaan_opt'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id_permintaan_opt = ($_GET["id_permintaan_opt"]);
  
    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM permintaan_opt WHERE id_permintaan_opt='$id_permintaan_opt'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if (!$result) {
      die("Query Error: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
    // apabila data tidak ada pada database maka akan dijalankan perintah ini
    if (!count($data)) {
      echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
    }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }
  session_start();
  if (!isset($_SESSION['sebagai'])) {
    header("Location: ../../index.php");
  }
  
  if (isset($_SESSION['sebagai'])) {
    if ($_SESSION['sebagai'] == 'admin_hr') {
      header('Location: admin_hr.php');
      exit;
    } elseif ($_SESSION['sebagai'] == 'karyawan') {
      header("Location: karyawan.php");
      exit;
    } elseif ($_SESSION['sebagai'] == 'hr') {
      header("Location: hr.php");
      exit;
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
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div>
                    <img src="../../assets/img/madep.png" alt="logo" width="45px">
                </div>

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="../mobil/index.php" >
                    <i class="fas fa-fw fa-car"></i>
                    <span>Data Mobil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="mobil.php" >
                    <i class="fas fa-fw fa-road"></i>
                    <span>Persetujuan Perjalanan Mobil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="non_mobil.php" >
                    <i class="fas fa-fw fa-road"></i>
                    <span>Persetujuan Perjalanan Non Mobil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data-mobil.php" >
                    <i class="fas fa-fw fa-receipt"></i>
                    <span>Data Persetujuan Perjalanan Mobil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data-non_mobil.php" >
                    <i class="fas fa-fw fa-receipt"></i>
                    <span>Data Persetujuan Perjalanan Non Mobil</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="../../logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray"></i>
                    <span>Logout</span></a>
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

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama_lengkap']; ?></span>
                                <img class="img-profile rounded-circle" src="../../assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a href="../../logout.php" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
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

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Permintaan Mobil</h6>
                            </div>
                            <div class="card-body">
                            <a href="data-mobil.php" style="margin:10px;" class="btn btn-success"><i class='fa fa-backward'>Kembali</i></a>
                                <table class="table table-bordered" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Rincian Tempat Tujuan</th>
                                            <th>kendaraan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1
                                    ?>
                                        <tbody>
                                            <tr>

                                                <td><?= $no++ ?></td>
                                                <td><?= $data['nama_pemesan']; ?></td>
                                                <td><?= $data['kota_tujuan']; ?></td>
                                                <td><?= $data['kendaraan']; ?></td>
                                                <td> <?php
                                                        if ($data['status_perjalanan'] == 0) {
                                                            echo '<span class=text-warning>Belum Disetujui</span>';
                                                        } elseif ($data['status_perjalanan'] == 1) {
                                                            echo '<span class=text-primary>Telah Disetujui</span>';
                                                        } else {
                                                            echo '<span class=text-danger>Tidak Disetujui</span>';
                                                        }
                                                        ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                </table>
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
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../assets/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../assets/js/demo/chart-area-demo.js"></script>
        <script src="../assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>