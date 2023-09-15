<?php

include 'koneksi.php';

error_reporting(0);
session_start();

if (isset($_SESSION['sebagai'])) {
  if ($_SESSION['sebagai'] == 'karywan') {
    header("Location: karyawan/index.php");
    exit;
  } elseif ($_SESSION['sebagai'] == 'ga') {
    header("Location: ga/index.php");
    exit;
  } elseif ($_SESSION['sebagai'] == 'admin_hr') {
    header("Location: admin_hr/index.php");
    exit;
  } elseif ($_SESSION['sebagai'] == 'hr') {
    header("Location: hr/index.php");
    exit;
  }
}

if (isset($_POST['btn-login'])) {
  $alamat_email = $_POST['alamat_email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM login WHERE alamat_email='$alamat_email' and password='$password'";
  $result = mysqli_query($koneksi, $sql);
  if (mysqli_num_rows($result) === 1) {
    $_SESSION['alamat_email'] = true;
    $rows = mysqli_fetch_assoc($result);
    if ($rows['sebagai'] == 'karyawan') {
      $_SESSION['sebagai'] = $rows['sebagai'];
      $_SESSION['nama_lengkap'] = $rows['nama_lengkap'];
      // $_SESSION['id'] = $rows['password'];
      return header("Location: karyawan/index.php");

      if (isset($_SESSION['alamat_email'])) {
        header("Location: karyawan/index.php");
        exit;
      }
    } elseif ($rows['sebagai'] == 'ga') {
      $_SESSION['sebagai'] = $rows['sebagai'];
      $_SESSION['nama_lengkap'] = $rows['nama_lengkap'];
      // $_SESSION['id'] = $rows['password'];
      return header("Location: ga/index.php");


      if (isset($_SESSION['alamat_email'])) {
        header("Location: login/index.php");
        exit;
      }
    } elseif ($rows['sebagai'] == 'admin_hr') {
      $_SESSION['sebagai'] = $rows['sebagai'];
      $_SESSION['nama_lengkap'] = $rows['nama_lengkap'];
      // $_SESSION['id'] = $rows['password'];
      return header("Location: admin_hr/index.php");


      if (isset($_SESSION['alamat_email'])) {
        header("Location: login/index.php");
        exit;
      }
    } elseif ($rows['sebagai'] == 'hr') {
      $_SESSION['sebagai'] = $rows['sebagai'];
      $_SESSION['nama_lengkap'] = $rows['nama_lengkap'];
      // $_SESSION['id'] = $rows['password'];
      return header("Location: hr/index.php");


      if (isset($_SESSION['alamat_email'])) {
        header("Location: login/index.php");
        exit;
      }
    }
  } else {
    echo "<script>alert('alamat_email atau password Anda salah. Silahkan coba lagi!')</script>";
  }
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
    <script src="jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="stylesheet" href="assets/css/index.css">
	<link rel="icon" 
      type="image/png" 
      href="favicon.png">
  </head>
  <body>
  <div class="bg-image"></div>
  
  <div class="row">

  <div align="center">
  <img src="assets/img/mitra.png" alt="logo" width="75px">
	<br \><br \>
			<div class="colm-form">
					<div class="form-container">
                <form method="post">
					<div >
						<h2>LOGIN</h2>
					</div>
					<br>
                    <div class="form-container">
                        <input type="text" name="alamat_email" id="alamat_email" placeholder="Email" />
                        <input type="password" name="password" id="password" placeholder="Password" />
                        <div align="center" class="g-recaptcha" data-sitekey="6Lfy96QnAAAAAHSvCumXxPcygbhm5C1F2Zmp-_P7"></div>

                        </div>
                        <button type="submit" id="login" class="btn-login" name="btn-login"  value="Submit">Masuk</button>
                        <a href="regist.php">Registrasi</a>
                </form>
			     </div>
            </div>
        </div>
    </div>
       
     
	
	
  </body>
</html>
<script>
  $(document).on('click','#login', function(){

    var response = grecaptcha.getResponse();
    if(response.length==0)
    {
      alert("Please verify you are not robot");
      return false;
    }
  });
</script>
