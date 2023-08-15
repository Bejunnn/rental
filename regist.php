<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
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
	<br \><br \>
			<div class="colm-form">
					<div class="form-container">
          <?php
        if (isset($_POST["submit"])) {
           $nama_lengkap = $_POST["nama_lengkap"];
           $no_telp = $_POST["no_telp"];
           $alamat_email = $_POST["alamat_email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];

           $errors = array();
           
           if (empty($nama_lengkap) OR empty($alamat_email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($alamat_email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "koneksi.php";
           $sql = "SELECT * FROM login WHERE alamat_email = '$alamat_email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO login (nama_lengkap, no_telp, alamat_email, password) VALUES ( ?, ?, ? ,? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"ssss",$nama_lengkap,  $no_telp, $alamat_email, $password);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
                <form method="post">
					<div >
						<h2>REGISTRASI</h2>
					</div>
					<br>
                    <div class="form-container">
                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap:">
                        <input type="text" class="form-control" name="no_telp" placeholder="No Handphone:">
                        <input type="email" class="form-control" name="alamat_email" placeholder="Email:">
                        <input type="password" class="form-control" name="password" placeholder="Password:">
                        <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">

                        </div>
                        <button type="submit" id="login" class="btn-login" value="Register" name="submit">Sign Up</button>
                        <a href="login.php">Login Disini</a>
                    
                </form>
			     </div>
            </div>
        </div>
    </div>
       
     
	
	
  </body>
</html>

