<?php
session_start();
if (!isset($_SESSION['sebagai'])) {
  header("Location: ../index.php");
}

if (isset($_SESSION['sebagai'])) {
  if ($_SESSION['sebagai'] == 'user') {
    header('Location: ./user.php');
  }
}

include '../koneksi.php';
$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM login WHERE id = $id");
$cek = mysqli_affected_rows($conn);

if ($cek > 0) {
  echo "<script> 
          alert('BERHASIL DI MENGHAPUS');
        </script>";
  header("Location: ./index.php");
} else {
  echo "<script> 
          alert('GAGAL DI MENGHAPUS');
        </script>";
  header("Location: ./index.php");
}