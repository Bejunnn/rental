<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../../koneksi.php';

// membuat variabel untuk menampung data dari form
$nama_pemesan = $_POST['nama_pemesan'];
$kendaraan = $_POST['kendaraan'];
$kota_tujuan = $_POST['kota_tujuan'];
$pengeluaran = $_POST['pengeluaran'];

// cek dulu jika ada data yang harus dimasukkan (misalnya, jika 'no_polisi' tidak kosong)
if (!empty($kendaraan)) {
    // Insert data into the 'permintaan' table
    $query = "INSERT INTO permintaan_opt ( nama_pemesan, kendaraan,kota_tujuan ,pengeluaran) 
              VALUES ('$nama_pemesan', '$kendaraan', '$kota_tujuan','$pengeluaran')";
    
    $result = mysqli_query($koneksi, $query);

    // periksa query apakah ada error
    if (!$result) {
        die ("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        // tampilkan alert dan akan redirect ke halaman index.php
        // silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil ditambah.'); window.location='../../booking/non_mobil.php';</script>";
    }
} else {
    // Menampilkan pesan jika 'no_polisi' kosong
    echo "<script>alert('nama tidak boleh kosong.'); window.location='../non_mobil.php';</script>";
}
?>
