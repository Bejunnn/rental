<?php
session_start();
if (!isset($_SESSION['sebagai'])) {
  header("Location: ../index.php");
}


if (isset($_SESSION['sebagai'])) {
    if ($_SESSION['sebagai'] == 'admin_hr') {
      header('Location: admin_hr.php');
      exit;
    } elseif ($_SESSION['sebagai'] == 'ga') {
      header("Location: ga.php");
      exit;
    } elseif ($_SESSION['sebagai'] == 'hr') {
      header("Location: hr.php");
      exit;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aplikasi book mobil</title>

    <!-- font awesome cdn link  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../assets/css/styles.css" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
    />

    <!-- custom js file link  -->
    <script src="../assets/js/script.js" defer></script>
  </head>
  <body>
    <!-- header section starts  -->

    <header class="header">
      <div id="menu-btn" class="fas fa-bars"></div>

      <a data-aos="zoom-in-left" data-aos-delay="150" href="#" class="logo">
        <img src="../assets/img/mitra.png" alt="Logo" width="40">
      </a>

      <nav class="navbar">
        <a data-aos="zoom-in-left" data-aos-delay="300" href="#home">home</a>
        <a data-aos="zoom-in-left" data-aos-delay="450" href="#about">about</a>
      </nav>

      <div class="half">
        <label for="profile2" class="profile-dropdown">
        <input type="checkbox" id="profile2">
        <img src="../assets/img/undraw_profile.svg">
        <span><?= $_SESSION['nama_lengkap']; ?></span>
        <label for="profile2"><i class="mdi mdi-menu"></i></label>
        <ul>
            <li><a href="#"><i class="mdi mdi-settings"></i>Settings</a></li>
            <li><a href="logout.php"><i class="mdi mdi-logout"></i>Logout</a></li>
        </ul>
        </label>
       </div>
    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">
      <div class="content">
        <h3 data-aos="fade-up" data-aos-delay="150"> Car Book</h3>
        <h3 data-aos="fade-up" data-aos-delay="300">Goes for The best</h3>
        <p data-aos="fade-up" data-aos-delay="450">
          Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Necessitatibus quia illum quod perspiciatis harum in possimus? Totam
          consequuntur officia quia?
        </p>
        <a data-aos="fade-up" data-aos-delay="600" href="./login.php" class="btn"
          >Sign In</a
        >
      </div>
    </section>

    <!-- home section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">
      <div class="img-container" data-aos="fade-right" data-aos-delay="300">
        <img src="../assets/img/r35.jpg" alt="" />
      </div>

      <div class="content" data-aos="fade-left" data-aos-delay="600">
        <span>Our History</span>
        <h3>Everything you need to build</h3>
        <p>
         Nissan GT-R adalah sebuah mobil sport yang dibuat oleh Nissan, dikeluarkan di Jepang pada tanggal 6 Desember 2007, Amerika Serikat pada tanggal 7 Juli 2008, dan seluruh dunia pada bulan Maret 2009.Mobil ini merupakan penerus dari jajaran Skyline GT-R.
        </p>
        <a href="#" class="btn">read more</a>
      </div>
    </section>

    <!-- about section ends -->
    <!-- popular section starts  -->

    <section
      class="popular"
      id="popular"
      data-aos="fade-up"
      data-aos-delay="150"
    >
      <div class="heading">
        <span>Top Rated</span>
        <h1>Most popular Vehicles</h1>
      </div>

      <div class="box-container">
        <div class="box">
          <span class="price"> $500k - $2000k </span>
          <img src="images/p-1.jpeg" alt="" />
          <h3>BMW</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <a href="#" class="btn">order now</a>
        </div>
        <div class="box">
          <span class="price"> $500k - $2000k </span>
          <img src="images/p-2.jpeg" alt="" />
          <h3>mercedes</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <a href="#" class="btn">order now</a>
        </div>
        <div class="box">
          <span class="price"> $500k - $2000k </span>
          <img src="images/p-3.jpeg" alt="" />
          <h3>Range Rover</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <a href="#" class="btn">order now</a>
        </div>
        <div class="box">
          <span class="price"> $500k - $2000k </span>
          <img src="images/p-4.jpeg" alt="" />
          <h3>porche</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <a href="#" class="btn">order now</a>
        </div>
        <div class="box">
          <span class="price"> $500k - $2000k </span>
          <img src="images/p-5.jpeg" alt="" />
          <h3>Nisan X</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <a href="#" class="btn">order now</a>
        </div>
        <div class="box">
          <span class="price"> $500k - $2000k </span>
          <img src="images/p-6.jpeg" alt="" />
          <h3>ferrari</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <a href="#" class="btn">order now</a>
        </div>
      </div>
    </section>

    <!-- popular section ends -->
    <!-- destination section starts  -->

    <section class="destination" id="destination">
      <div class="heading">
        <span>Why Choose Us?</span>
        <h1>Like a Professional</h1>
      </div>

      <div class="box-container">
        <div class="box" data-aos="fade-up" data-aos-delay="150">
          <div class="image">
            <img src="images/des1" alt="" />
          </div>
          <div class="content">
            <h3>BELTS AND ENGINE</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
            <a href="#">read more <i class="fas fa-angle-right"></i></a>
          </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="450">
          <div class="image">
            <img src="images/des3.jpeg" alt="" />
          </div>
          <div class="content">
            <h3>BELTS AND ENGINE</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
            <a href="#">read more <i class="fas fa-angle-right"></i></a>
          </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="1300">
          <div class="image">
            <img src="images/des4.jpeg" alt="" />
          </div>
          <div class="content">
            <h3>BELTS AND ENGINE</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
            <a href="#">read more <i class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>
    </section>

    <!-- destination section ends -->

    <!-- review section starts  -->

    <section class="review" id="review">
      <div class="heading">
        <span>our customers </span>
        <h1>reviews</h1>
      </div>
      <div class="box-container">
        <div class="box">
          <img src="images/pic-1.png" alt="" />
          <h4>john deo</h4>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti
            delectus, ducimus facere quod ratione vel laboriosam? Est, maxime
            rem. Itaque.
          </p>
        </div>
        <div class="box">
          <img src="images/pic-2.png" alt="" />
          <h4>john deo</h4>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti
            delectus, ducimus facere quod ratione vel laboriosam? Est, maxime
            rem. Itaque.
          </p>
        </div>
        <div class="box">
          <img src="images/pic-3.png" alt="" />
          <h4>john deo</h4>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti
            delectus, ducimus facere quod ratione vel laboriosam? Est, maxime
            rem. Itaque.
          </p>
        </div>
      </div>
    </section>

    <!-- review section ends -->

    <!-- banner section ends -->
    <!-- footer section starts  -->

    <section class="footer">
      <div class="box-container">

        <div class="box" data-aos="fade-up" data-aos-delay="300">
          <h3>quick links</h3>
          <a href="#home" class="links">
            <i class="fas fa-arrow-right"></i> home
          </a>
          <a href="#about" class="links">
            <i class="fas fa-arrow-right"></i> about
          </a>
          <a href="#destination" class="links">
            <i class="fas fa-arrow-right"></i> destination
          </a>
          <a href="#services" class="links">
            <i class="fas fa-arrow-right"></i> services
          </a>
          <a href="#gallery" class="links">
            <i class="fas fa-arrow-right"></i> gallery
          </a>
          <a href="./admin.php" class="links">
            <i class="fas fa-arrow-right"></i> Login Admin
          </a>
        </div>
          </form>
        </div>
      </div>
    </section>

    <div class="credit">
      created by <span>Adhi,Arjun dan Wailen</span>
    </div>

    <!-- footer section ends -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
      AOS.init({
        duration: 800,
        offset: 150,
      });
    </script>
  </body>
</html>
