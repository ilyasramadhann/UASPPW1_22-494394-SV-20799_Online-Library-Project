<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($name) || empty($username) || empty($password)) {
        echo "<script>alert('Harap isi semua data.');</script>";
        echo "<script>window.location.href = 'signup.php';</script>";
        exit(); 
    }

    $checkQuery = "SELECT * FROM anggota WHERE USERNAME='$username'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username sudah terpakai. Silakan gunakan username lain.');</script>";
        echo "<script>window.location.href = 'signup.php';</script>";
        exit(); 
    } else {
        $idAnggota = $username; 
        $insertQuery = "INSERT INTO anggota (ID_ANGGOTA, NAMA_ANGGOTA, USERNAME, PASSWORD) VALUES ('$idAnggota', '$name', '$username', '$password')";
        if (mysqli_query($conn, $insertQuery)) {
            header("Location: ../login/login.php");
            exit(); 
        } else {
            echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="../bootstrap-5.0.2-dist/css/bootstrap.min.css"
    />
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx icon align-self-center"
          ><img src="../assets/logo.png" width="28px" alt=""
        /></i>
        <div class="logo_name">DigiLib</div>
        <i class="bx bx-menu" id="btn"></i>
      </div>
      <ul class="nav-list">
        <li>
          <a href="../home/home.php">
            <i class="bx bx-home"></i>
            <span class="links_name">Home</span>
          </a>
          <span class="tooltip">Home</span>
        </li>
        <li>
          <a href="../library/library.php">
            <i class="bx bx-library"></i>
            <span class="links_name">Library</span>
          </a>
          <span class="tooltip">Library</span>
        </li>
        <li>
          <a href="../login/login.php">
            <i class="bx bx-log-in"></i>
            <span class="links_name">Log In</span>
          </a>
          <span class="tooltip">Log In</span>
        </li>
        <li>
          <a href="../rent/rent.php">
            <i class="bx bx-calendar"></i>
            <span class="links_name">Rent</span>
          </a>
          <span class="tooltip">Rent</span>
        </li>
        <li class="profile">
          <div class="profile-details">
            <div class="name_job">
              <div class="name">Prem Shahi</div>
              <div class="job">Member</div>
            </div>
          </div>
          <button href=""><i class="bx bx-log-out" id="log_out"></i></button>
        </li>
      </ul>
    </div>

    <div class="login">
      <div class="d-flex flex-row flex-wrap justify-content-evenly">
        <div class="p-0" id="title">
          <h1>ONLINE LIBRARY</h1>
          <p><img src="../assets/login.png" width="400px" alt="" /></p>
        </div>
        <div class="p-0" id="form">
          <h1 class="title">USER SIGN UP</h1>
          <h2 class="subtitle">Welcome to the website</h2>
          <form action="signup.php" method="POST">
            <p>
              <input
                type="text"
                id="name"
                name="name"
                placeholder="Name"
                style="color: #0f66b6"
              />
            </p>
            <p>
              <input
                type="text"
                id="username"
                name="username"
                placeholder="Username"
                style="color: #0f66b6"
              />
            </p>
            <p>
              <input
                type="password"
                id="password"
                name="password"
                placeholder="Password"
                style="color: #0f66b6"
              />
            </p>
            <p>
              <button type="submit" class="btn btn-primary">SIGN UP</button>
            </p>
            <p class="keterangan">
              Already have account?
              <span><a href="../login/login.php">Log In here!</a></span>
            </p>
          </form>
        </div>
      </div>
    </div>

    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="d-flex bd-highlight justify-content-start">
              <a class="footer-img" href="#">
                <img src="../assets/brandlogo.png" alt="logo" width="200px" />
              </a>
            </div>
          </div>
          <div class="col">
            <div class="d-flex bd-highlight justify-content-end">
              <a href="../home/home.php">HOME</a>
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
