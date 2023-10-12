<?php
include '../../../koneksi.php';
$id_permintaan_opt = $_GET['id_permintaan_opt'];

// Properly escape the value to prevent SQL injection
$id_permintaan_opt = mysqli_real_escape_string($koneksi, $id_permintaan_opt);

$result = mysqli_query($koneksi, "DELETE FROM permintaan_opt WHERE id_permintaan_opt = '$id_permintaan_opt'");
$cek = mysqli_affected_rows($koneksi);

if ($cek > 0) {
  echo "<script> 
          alert('BERHASIL DI MENGHAPUS');
        </script>";
  header("Location: ../data-non_mobil.php");
} else {
  echo "<script> 
          alert('GAGAL DI MENGHAPUS');
        </script>";
  header("Location: ../data-non_mobil.php");
}
?>
