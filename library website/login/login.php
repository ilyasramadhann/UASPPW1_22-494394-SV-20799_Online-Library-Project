<?php
session_start();

function connectDB() {
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'library';

  $conn = mysqli_connect($host, $username, $password, $database);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  return $conn;
}

function login($username, $password) {
  $conn = connectDB();

  $username = mysqli_real_escape_string($conn, $username);
  $password = mysqli_real_escape_string($conn, $password);

  $query = "SELECT * FROM anggota WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $row['nama']; 
    header("Location: ../home/home.php");
    exit();
  } else {
    $error = "Invalid username or password";
    return $error;
  }

  if (isset($conn)) {
    mysqli_close($conn);
  }
}

function logout() {
  session_unset();
  session_destroy();

  header("Location: login.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $error = login($username, $password);
}

if (isset($_GET['logout'])) {
  logout();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <title>Log In</title>
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
        <a href="../home/home.php">
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
        <a href="#">
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

  <div class="login">
    <div class="d-flex flex-row flex-wrap justify-content-evenly">
      <div class="p-0" id="title">
        <h1>ONLINE LIBRARY</h1>
        <p><img src="../assets/login.png" width="400px" alt="" /></p>
      </div>
      <div class="p-0" id="form">
        <h1 class="title">USER LOG IN</h1>
        <h2 class="subtitle">Welcome to the website</h2>
        <form action="login.php" method="POST">
          <p>
            <input type="text" id="username" name="username" placeholder="Username" style="color: #0f66b6" />
          </p>
          <p>
            <input type="password" id="password" name="password" placeholder="Password" style="color: #0f66b6" />
          </p>
          <p><button class="btn btn-primary">LOG IN</button></p>
        </form>
        <p class="keterangan">
          Doesn't have an account?
          <span><a href="../signup/signup.php">Sign Up here!</a></span>
        </p>
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
            <a href="#">LOGIN</a>
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

  <?php if (isset($error)) : ?>
    <script>
      alert('<?php echo $error; ?>');
    </script>
  <?php endif; ?>
</body>
</html>
