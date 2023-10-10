<?php
include('../../koneksi.php');
$result = mysqli_query($koneksi, "SELECT * FROM mobil");
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

    <title>Kelola Data Mobil</title>

    <!-- Custom fonts for this template-->
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div>
            <img src="../../assets/img/madep.png" alt="logo" width="45px">
            </div>
            
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="../index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

    

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active">
                <a class="nav-link" href="index.php" >
                    <i class="fas fa-fw fa-car"></i>
                    <span>Data Mobil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../akun/index.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Akun</span>
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
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $_SESSION['nama_lengkap']; ?></span>
                            <img class="img-profile rounded-circle"
                                src="../../assets/img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a href="../../logout.php" class="dropdown-item" >
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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Mobil</h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="proses/proses_tambah.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_mobil">Nama Mobil</label>
                            <input type="text" name="nama_mobil" id="nama_mobil" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                        </div>
                            <div class="form-group">
                                <label for="no_polisi">No Polisi</label>
                                <input type="text" name="no_polisi" id="no_polisi" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                            </div>
                            <div class="row">
                            <div class="form-group col-6">
                                <label for="jumlah_kursi">Jumlah Kursi</label>
                                <input type="number" name="jumlah_kursi" id="jumlah_kursi" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label for="tahun_beli">Tahun Beli</label>
                                <input type="number" name="tahun_beli" id="tahun_beli" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar Mobil</label>
                                <input type="file" name="gambar" id="gambar" required="required" placeholder="ketik" autocomplete="off" class="form-control-file">
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Mobil</h6>
                </div>
                <div class="card-body">

                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mobil</th>
                                <th>Kursi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $no = '1';
                        foreach ($rows as $data) { 
                        ?>
                        <tbody>            
                                <tr>
                                    
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['nama_mobil']; ?></td>
                                    <td><?= $data['jumlah_kursi']; ?></td>
                                    <td>
                                        <?php
                                        if ($data['status'] == 1) {
                                            echo '<p><a href="active.php?id_mobil=' . $data['id_mobil'] . '&status=0" class="btn btn-danger">inActive</a></p>';
                                        } else {
                                            echo '<p><a href="active.php?id_mobil=' . $data['id_mobil'] . '&status=1" class="btn btn-success">Active</a></p>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a title="edit" class="btn btn-primary" href="edit.php?id_mobil=<?php echo $data['id_mobil']; ?>"><i class="fas fa-edit"></i></a>
                                        <a title="detail" class="btn btn-info" href="detail.php?id_mobil=<?php echo $data['id_mobil']; ?>"><i class="fas fa-eye"></i></a>
                                        <a title="hapus" class="btn btn-danger" href="proses/proses_hapus.php?id_mobil=<?php echo $data['id_mobil']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fas fa-trash"></i></a>&nbsp;
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


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