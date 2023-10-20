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
    header("Location: ../index.php");
}

if (isset($_SESSION['sebagai'])) {
    if ($_SESSION['sebagai'] == 'admin_hr') {
        header('Location: admin_hr.php');
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
            <li class="nav-item">
                <a class="nav-link" href="booking.php" >
                    <i class="fas fa-fw fa-receipt"></i>
                    <span>Booking</span>
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
                           <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $_SESSION['nama_lengkap']; ?></span>
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
                        <h1 class="h3 mb-0 text-gray-800">Booking Mobil</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Pilih Data</h6>
                                </div>
                                <div class="card-body">
                                <form method="POST" action="../booking/proses/proses_tambah.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input name="id_mobil" id="id_mobil" value="<?php echo $data['id_mobil']; ?>" hidden />
                                            <div class="form-group">
                                                <label for="nama_pemesan">Nama Mobil</label>
                                                <input type="text" value="<?= $data['nama_mobil']; ?>" name="nama_mobil" id="nama_mobil" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_pemesan">Nama Pemesan</label>
                                                <input type="text" value="<?= $_SESSION['nama_lengkap']; ?>" name="nama_pemesan" id="nama_pemesan" required="required" placeholder="ketik" autocomplete="off" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="kota_tujuan">Rincian Tempat Tujuan</label>
                                                <input type="text" name="kota_tujuan" id="kota_tujuan" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="pengeluaran">Biaya Pengeluaran</label>
                                                <input type="text" name="pengeluaran" id="pengeluaran" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="no_polisi">No Polisi</label>
                                                    <input type="text" value="<?= $data['no_polisi']; ?>" name="no_polisi" id="no_polisi" class="form-control" readonly>
                                                </div>
                                                
                                                <div class="form-group col-6">
                                                    <label for="jumlah_kursi">Jumlah Kursi</label>
                                                    <input type="number" value="<?= $data['jumlah_kursi']; ?>" name="jumlah_kursi" id="jumlah_kursi" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <label for="tahun_beli">Tahun Beli</label>
                                                <input type="number" value="<?= $data['tahun_beli']; ?>" name="tahun_beli" id="tahun_beli" class="form-control" readonly>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" required="required" autocomplete="off" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tanggal_kembali">Tanggal Kembali</label>
                                                        <input type="date" name="tanggal_kembali" id="tanggal_kembali" required="required" autocomplete="off" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-primary" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
                                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                                        </div>
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
<script>
    function detail() {
        var nama_mobil = $("#nama_mobil").val();
        $.ajax({
            url: "data.php",
            method: "POST",
            data: {
                nama_mobil:nama_mobil
            },
            dataType: "json",
            success: function(data) { // Corrected "success" spelling
                $('#id_mobil').val(data.id_mobil);
                $('#no_polisi').val(data.no_polisi);
                $('#jumlah_kursi').val(data.jumlah_kursi);
                $('#tahun_beli').val(data.tahun_beli);
            }
        })
    }
</script>