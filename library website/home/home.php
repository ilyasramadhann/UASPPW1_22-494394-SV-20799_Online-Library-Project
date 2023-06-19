<?php
session_start();

function logout() {

  session_unset();
  session_destroy();

  header("Location: ../login/login.php");
  exit();
}

if (isset($_GET['logout'])) {
  logout();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <title>Home</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css" />
  <!-- Boxicons CDN Link -->
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class="bx icon align-self-center"><img src="../assets/logo.png" width="28px" alt=""></i>
      <div class="logo_name">DigiLib</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="#">
          <i class='bx bx-home'></i>
          <span class="links_name">Home</span>
        </a>
        <span class="tooltip">Home</span>
      </li>
      <li>
        <a href="../library/library.php">
          <i class='bx bx-library' ></i>
          <span class="links_name">Library</span>
        </a>
        <span class="tooltip">Library</span>
      </li>
      <li>
        <a href="../login/login.php">
          <i class='bx bx-log-in' ></i>
          <span class="links_name">Log In</span>
        </a>
        <span class="tooltip">Log In</span>
      </li>
      <li>
        <a href="../rent/rent.php">
          <i class='bx bx-calendar'></i>
          <span class="links_name">Rent</span>
        </a>
        <span class="tooltip">Rent</span>
      </li>
      <?php if (isset($_SESSION['username'])) : ?>
        <li class="profile">
          <div class="profile-details">
            <div class="name_job">
              <div class="name"><?php echo $_SESSION['username']; ?></div>
              <div class="job">Member</div>
            </div>
          </div>
          <a class="logout" href="?logout=true"><i class='bx bx-log-out' id="log_out" ></i></a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
    <section class="home-section">
      <div class="d-flex flex-row bd-highlight flex-wrap mb-3 justify-content-center">
        <div class="p-2 w-50 bd-highlight">
          <div class="text">DIGITAL<br /><span class="library">LIBRARY</span></div>
          <div class="desc">
            Digital library provides easy<br />access to diverse information<br />resources
            for convenient learning<br />and exploration.
          </div>
          <a href="../rent/rent.php" type="button" class="btn btn-primary">Rent</a>
        </div>
        <div class="p-2 w-50 bd-highlight align-self-center">
          <img src="../assets/jbassets.png" alt="" />
        </div>
      </div>
    </section>

    <div class="section-2">
      <div class="d-flex flex-row bd-highlight mb-3 justify-content-center">
        <div class="p-2 bd-highlight">
          <p><img src="../assets/gift.png" height="50" alt="" /></p>
          <p>Free Gift Wrapping</p>
        </div>
        <div class="p-2 bd-highlight">
          <p><img src="../assets/shopping.png" height="50" alt="" /></p>
          <p>Online Ordering</p>
        </div>
        <div class="p-2 bd-highlight">
          <p><img src="../assets/books.png" height="50" alt="" /></p>
          <p>Used Book Buying</p>
        </div>
        <div class="p-2 bd-highlight">
          <p><img src="../assets/rocket.png" height="50" alt="" /></p>
          <p>Returnes & Exchanges</p>
        </div>
        <div class="p-2 bd-highlight">
          <p><img src="../assets/box.png" height="50" alt="" /></p>
          <p>Fast Delivery</p>
        </div>
      </div>
    </div>
    
    <div class="section-3">
      <div class="container">
      <h1>Explore Our Digital Library</h1>
      <h2>Anywhere & Anytime</h2>
      <div class="d-flex flex-row bd-highlight flex-wrap mb-3 justify-content-evenly">
        <div class="p-2 bd-highlight">
          <p class="title1">ONLINE LIBRARY</p>
          <p class="img"><img src="../assets/desc1.png" height="130" alt="" /></p>
          <p class="subtitle">Large selection of books</p>
          <p class="desc1">
            Diverse library offers vast selection for avid readers.
          </p>
        </div>
        <div class="p-2 bd-highlight">
          <p class="title2">ONLINE LIBRARY</p>
          <p><img src="../assets/desc2.png" height="130" alt="" /></p>
          <p class="subtitle">Library on computer</p>
          <p class="desc2">Digital library accessible on your computer.</p>
        </div>
        <div class="p-2 bd-highlight">
          <p class="title3">ONLINE LIBRARY</p>
          <p><img src="../assets/desc3.png" height="130" alt="" /></p>
          <p class="subtitle">In your smartphone</p>
          <p class="desc3">Mobile library at your fingertips.</p>
        </div>
      </div>
      </div>
    </div>

    <div class="section-4">
      <div class="container">
        <h1>Unveiling Our Prime Location</h1>
        <h2>Easily Accessible</h2>
      </div>
      <div class="d-flex flex-row flex-wrap bd-highlight mb-3 align-items-center justify-content-center">
        <div class="p-2 bd-highlight">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.623033233787!2d106.82434547458466!3d-6.181182593806294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f442596e0c93%3A0x4ba58be40979fe36!2sPerpustakaan%20Nasional%20Republik%20Indonesia!5e0!3m2!1sid!2sid!4v1686950067585!5m2!1sid!2sid" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="p-2 bd-highlight">
          <p class="desc">Available on Google Maps</p>
          <p><a href="https://goo.gl/maps/g5Dx8AhJQ1v3PmLm8" type="button" class="btn btn-primary">Go To Google Maps</a></p>
        </div>
    </div>

    <footer class="footer">
      <div class="container">
          <div class="row">
              <div class="col">
                  <div class="d-flex bd-highlight justify-content-start">
                      <a class="footer-img" href="#">
                          <img src="../assets/brandlogo.png" alt="logo" width="200px">
                      </a>
                  </div>
              </div>
              <div class="col">
                  <div class="d-flex bd-highlight justify-content-end">
                      <a href="#">HOME</a>
                      <a href="../library/library.php">LIBRARY</a>
                      <a href="../login/login.php">LOGIN</a>
                      <a href="../rent/rent.php">RENT</a>
                  </div>
              </div>
          </div>
      </div>
    </footer>

    <script>
      let sidebar = document.querySelector(".sidebar");
      let closeBtn = document.querySelector("#btn");

      closeBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        menuBtnChange(); 
      });

      function menuBtnChange() {
        if (sidebar.classList.contains("open")) {
          closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); 
        } else {
          closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); 
        }
      }
    </script>
  </body>
</html>
