<?php
include 'koneksi.php';
$id = $_GET['id'];

$result = mysqli_query($koneksi, "DELETE FROM mobil WHERE id = $id");
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