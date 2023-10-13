<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../../koneksi.php';

	// membuat variabel untuk menampung data dari form
  $nama_mobil = $_POST['nama_mobil'];
  $no_polisi = $_POST['no_polisi'];
  $jumlah_kursi = $_POST['jumlah_kursi'];
  $tahun_beli = $_POST['tahun_beli'];
  $gambar = $_FILES['gambar']['name'];


//cek dulu jika ada foto produk jalankan coding ini
if($gambar != "") {
  $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file foto yang bisa diupload 
  $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../../../assets/foto/'.$nama_gambar_baru); //memindah file foto ke folder foto
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO mobil ( nama_mobil, no_polisi, jumlah_kursi, tahun_beli, gambar) VALUES ( '$nama_mobil','$no_polisi','$jumlah_kursi','$tahun_beli', '$nama_gambar_baru')";
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

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi foto yang boleh hanya jpg,jpeg atau png.');window.location='../tambah.php';</script>";
            }
} else {
   $query = "INSERT INTO mobil ( nama_mobil, no_polisi, jumlah_kursi, tahun_beli, gambar) VALUES ( '$nama_mobil','$no_polisi','$jumlah_kursi','$tahun_beli', null)";
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

 
