<?php  

include "../../koneksi.php";

if(isset($_GET['id_permintaan'])) {
	$id_permintaan = $_GET['id_permintaan'];
	$tanggal = date('Y-m-d');
	
	$query1 = mysqli_query($koneksi, "UPDATE permintaan SET status=1 WHERE id_permintaan='$id_permintaan' ");		

	$query2 = mysqli_query($koneksi, "SELECT * FROM permintaan WHERE id_permintaan='$id'");
	
	$row = mysqli_fetch_assoc($query2);

	$query3 = mysqli_query($koneksi, "INSERT INTO permintaan ( nama_pemesan, tanggal_pinjam, tanggal_kembali, kota_tujuan)
		VALUES ('$row[nama_pemesan]', '$row[tanggal_pinjam]', '$row[tanggal_kembali]', '$row[kota_tujuan]') ");

	if($query3) {
		header("location:mobil.php");
	} else {
		echo "ada yang salah" . mysqli_error($koneksi);
	}
}


?>