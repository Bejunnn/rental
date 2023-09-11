<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id = $_POST['id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama = $_POST['nama'];
  $sebagai = $_POST['sebagai'];
  $foto = $_FILES['foto']['name'];
  //cek dulu jika merubah foto produk jalankan coding ini
  if($foto != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file foto yang bisa diupload 
    $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_foto_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, '../../assets/foto/'.$nama_foto_baru); //memindah file foto ke folder foto
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE login SET username = '$username', password = '$password',nama = '$nama',sebagai = '$sebagai', foto = '$nama_foto_baru'";
                    $query .= "WHERE id = '$id'";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='../index.php';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi foto yang boleh hanya jpg,jpeg atau png.');window.location='../tambah.php';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE login SET username = '$username', password = '$password',nama = '$nama',sebagai = '$sebagai'";
      $query .= "WHERE id = '$id'";
      $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data berhasil diubah.');window.location='../index.php';</script>";
      }
    }

 