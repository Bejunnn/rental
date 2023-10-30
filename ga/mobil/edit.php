<?php
// memanggil file koneksi.php untuk membuat koneksi
include '../../koneksi.php';

// mengecek apakah di url ada nilai GET id
if (isset($_GET['id_mobil'])) {
  // ambil nilai id dari url dan disimpan dalam variabel $id
  $id_mobil = ($_GET["id_mobil"]);

  // menampilkan data dari database yang mempunyai id=$id
  $query = "SELECT * FROM mobil WHERE id_mobil='$id_mobil'";
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

  <title>Kelola Data Mobil</title>

  <!-- Custom fonts for this template-->
  <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
          <img src="../../assets/img/mitra.png" alt="logo" width="45px">
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
                <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#booking"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-road"></i>
                    <span>Persetujuan Perjalanan</span>
                </a>
                <div id="booking" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../booking/mobil.php">Mobil</a>
                        <a class="collapse-item" href="../booking/non_mobil.php">Non Mobil</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#data"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-receipt"></i>
                    <span>Data Perjalanan</span>
                </a>
                <div id="data" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../booking/data-mobil.php">Mobil</a>
                        <a class="collapse-item" href="../booking/data-non_mobil.php">Non Mobil</a>
                    </div>
                </div>
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Mobil</h1>
          </div>

          <!-- Content Row -->

          <div class="row">

            <div class="col-sm-6">
              <div class="card shadow">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold text-primary">Ubah Data</h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="proses/proses_edit.php" enctype="multipart/form-data">
                    <section class="base">
                    <!-- menampung nilai id  yang akan di edit -->
                    <input name="id" value="<?php echo $data['id_mobil']; ?>" hidden />
                    <div class="form-group">
                      <label for="nama_mobil">Nama Mobil</label>
                      <input type="text" value="<?php echo $data['nama_mobil']; ?>" name="nama_mobil" id="nama_mobil" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                    </div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="no_polisi">No Polis</label>
                        <input type="no_polisi" value="<?php echo $data['no_polisi']; ?>" name="no_polisi" id="no_polisi" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                      </div>
                      <div class="form-group col-6">
                        <label for="jumlah_kursi">Jumlah Kursi</label>
                        <input type="number" value="<?php echo $data['jumlah_kursi']; ?>" name="jumlah_kursi" id="jumlah_kursi" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="tahun_beli">Tahun Beli</label>
                        <input type="number" value="<?php echo $data['tahun_beli']; ?>" name="tahun_beli" id="tahun_beli" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="gambar">Gambar Mobil</label>
                      <input type="file" name="gambar" id="gambar" required="required" placeholder="ketik" autocomplete="off" class="form-control-file">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-sm btn-success" name="ubah"><i class="fa fa-pen"></i> Ubah</button>
                      <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                      <a href="index.php" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
                    </div>
                    </section>
                  </form>
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