<?php  

include "../../koneksi.php";

if (isset($_GET['id_permintaan'])) {
	$id_permintaan = $_GET['id_permintaan'];

	$query = mysqli_query($koneksi, "UPDATE permintaan SET status_pengeluaran=2 WHERE id_permintaan='$id_permintaan' ");

	if($query) {
		header("location:pengeluaran_mobil.php");
	} else {
		echo "error : " . mysqli_error($koneksi);
	}
}


?>