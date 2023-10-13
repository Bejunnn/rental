<?php
include '../../../koneksi.php';
$id_mobil = $_GET['id_mobil'];

// Properly escape the value to prevent SQL injection
$id_mobil = mysqli_real_escape_string($koneksi, $id_mobil);

$result = mysqli_query($koneksi, "DELETE FROM mobil WHERE id_mobil = '$id_mobil'");
$cek = mysqli_affected_rows($koneksi);

if ($cek > 0) {
  echo "<script> 
          alert('BERHASIL DI MENGHAPUS');
        </script>";
  header("Location: ../index.php");
} else {
  echo "<script> 
          alert('GAGAL DI MENGHAPUS');
        </script>";
  header("Location: ../index.php");
}
?>
