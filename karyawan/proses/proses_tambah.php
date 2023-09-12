<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../mobil/koneksi.php';

// membuat variabel untuk menampung data dari form
$merk = $_POST['merk'];
$nama = $_POST['nama'];
$no_polisi = $_POST['no_polisi'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];

// cek dulu jika ada data yang harus dimasukkan (misalnya, jika 'no_polisi' tidak kosong)
if (!empty($nama)) {
    // Insert data into the 'permintaan' table
    $query = "INSERT INTO permintaan (merk, nama, no_polisi, tanggal_pinjam, tanggal_kembali) 
              VALUES ('$merk', '$nama', '$no_polisi', '$tanggal_pinjam', '$tanggal_kembali')";
    
    $result = mysqli_query($koneksi, $query);

    // periksa query apakah ada error
    if (!$result) {
        die ("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        // tampilkan alert dan akan redirect ke halaman index.php
        // silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil ditambah.'); window.location='../mobil/index.php';</script>";
    }
} else {
    // Menampilkan pesan jika 'no_polisi' kosong
    echo "<script>alert('nama tidak boleh kosong.'); window.location='../index.php';</script>";
}
?>
