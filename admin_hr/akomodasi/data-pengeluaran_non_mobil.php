<?php
include('../../koneksi.php');
$result = mysqli_query($koneksi, "SELECT * FROM permintaan_opt WHERE status_pengeluaran");
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
session_start();
if (!isset($_SESSION['sebagai'])) {
    header("Location: ../index.php");
}

if (isset($_SESSION['sebagai'])) {
    if ($_SESSION['sebagai'] == 'karyawan') {
        header('Location: karyawan.php');
        exit;
    } elseif ($_SESSION['sebagai'] == 'ga') {
        header("Location: ga.php");
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
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="../akun/index.php" >
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Akun</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pengeluaran_mobil.php" >
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Persetujuan Akomodasi Perjalanan Mobil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pengeluaran_non_mobil.php" >
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Persetujuan Akomodasi Perjalanan Non Mobil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data-pengeluaran_mobil.php" >
                    <i class="fas fa-fw fa-receipt"></i>
                    <span>Data Akomodasi Perjalanan Mobil</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="data-pengeluaran_non_mobil.php" >
                    <i class="fas fa-fw fa-receipt"></i>
                    <span>Data Akomodasi Perjalanan Non Mobil</span>
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
                                <h6 class="m-0 font-weight-bold text-primary">Data Akomodasi Mobil</h6>
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Pengeluaran</th>
                                            <th>Detail</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = '1';
                                    if (mysqli_num_rows($result)) {
                                        foreach ($rows as $data) {
                                    ?>
                                            <tbody>
                                                <tr>

                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data['nama_pemesan']; ?></td>
                                                    <td><?= $data['pengeluaran']; ?></td>
                                                    <td>
                                                        <a href="detail-pengeluaran_non_mobil.php?id_permintaan_opt=<?php echo $data['id_permintaan_opt']; ?>"><span data-placement='top' data-toggle='tooltip' title='Detail Pengeluaran'><button class="btn btn-info">Detail Pengeluaran</button></span></a>
                                                    </td>
                                                    <td>
                                                    <a title="hapus" class="btn btn-danger" href="proses/proses_hapus.php?id_permintaan_opt=<?php echo $data['id_permintaan_opt']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fas fa-trash"></i></a>&nbsp;
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                            ?>
                                        <?php $no++;
                                    } else {
                                        echo "<tr><td colspan=5>Tidak ada permintaan.</td></tr>";
                                    } ?>
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
        <script src="../../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../../assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../../assets/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../../assets/js/demo/chart-area-demo.js"></script>
        <script src="../../assets/js/demo/chart-pie-demo.js"></script>

        <!-- Page level plugins -->
        <script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../../assets/js/demo/datatables-demo.js"></script>

</body>

</html>