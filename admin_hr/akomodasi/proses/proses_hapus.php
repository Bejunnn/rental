<?php
include '../../../koneksi.php';
$id_permintaan = $_GET['id_permintaan'];

// Properly escape the value to prevent SQL injection
$id_permintaan = mysqli_real_escape_string($koneksi, $id_permintaan);

$result = mysqli_query($koneksi, "DELETE FROM permintaan WHERE id_permintaan = '$id_permintaan'");
$cek = mysqli_affected_rows($koneksi);

if ($cek > 0) {
  echo "<script> 
          alert('BERHASIL DI MENGHAPUS');
        </script>";
  header("Location: ../data-pengeluaran_mobil.php");
} else {
  echo "<script> 
          alert('GAGAL DI MENGHAPUS');
        </script>";
  header("Location: ../data-pengeluaran_mobil.php");
}
?>
