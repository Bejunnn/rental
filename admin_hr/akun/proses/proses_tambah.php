<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../../koneksi.php';

	// membuat variabel untuk menampung data dari form

  $nama_lengkap = $_POST['nama_lengkap'];
  $alamat_email = $_POST['alamat_email'];
  $no_telp= $_POST['no_telp'];
  $password = $_POST['password'];
  $sebagai = $_POST['sebagai'];


//cek dulu jika ada foto produk jalankan coding ini
if($nama_lengkap != "") {
   $query = "INSERT INTO login ( nama_lengkap, alamat_email, no_telp, password, sebagai) VALUES ( '$nama_lengkap','$alamat_email','$no_telp','$password','$sebagai' )";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='../index.php';</script>";
                  }
}

 
