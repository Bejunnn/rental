<?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM login WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD </title>
    <style type="text/css">
    body{
      background-color: #4e73df;
    }
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: white;
      }
    button {
          background-color: #4e73df;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: #4e73df;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  </head>
  <body>
      <center>
        <h1>Edit  <?php echo $data['nama']; ?></h1>
      <center>
      <form method="POST" action="proses/proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id  yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Username</label>
          <input type="text" name="username" value="<?php echo $data['username']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Password</label>
         <input type="text" name="password" value="<?php echo $data['password']; ?>" />
        </div>
        <div>
          <label>Nama</label>
          <input type="text" name="nama" value="<?php echo $data['nama']; ?>" autofocus="" required="" />
        </div>
        <div >
          <label>Sebagai</label>
          <select name="sebagai" >
            <option value="admin">admin</option>
            <option value="user">user</option>
          </select>
        </div>
        <div>
          <label>foto</label>
          <img src="../assets/foto/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="foto" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah foto</i>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>