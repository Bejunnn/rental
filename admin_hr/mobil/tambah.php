<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tambah Admin/User</title>
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
  <body>
      <center>
        <h1>Tambah Admin/User</h1>
      <center>
      <form method="POST" action="proses/proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Username</label>
          <input type="text" name="username" autofocus="" required="" />
        </div>
        <div>
          <label>Password</label>
         <input type="text" name="password" />
        </div>
        <div>
          <label>Nama</label>
          <input type="text" name="nama" autofocus="" required="" />
        </div>
        <div>
        <div >
          <label>Sebagai</label>
          <select name="sebagai" >
            <option value="admin">admin</option>
            <option value="user">user</option>
          </select>
        </div>
          <label>Foto</label>
         <input type="file" name="foto" required="" />
        </div>
        <div>
         <button type="submit">Simpan</button>
        </div>
        <br>
        <div>
          <a href="index.php">kembali</a>
        </div>
        </section>
      </form>
  </body>
</html>