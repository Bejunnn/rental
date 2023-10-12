<?php  

include "../../koneksi.php";

if (isset($_GET['id_permintaan_opt'])) {
	$id_permintaan_opt = $_GET['id_permintaan_opt'];

	$query = mysqli_query($koneksi, "UPDATE permintaan_opt SET status_perjalanan=2 WHERE id_permintaan_opt='$id_permintaan_opt' ");

	if($query) {
		header("location:non_mobil.php");
	} else {
		echo "error : " . mysqli_error($koneksi);
	}
}


?>