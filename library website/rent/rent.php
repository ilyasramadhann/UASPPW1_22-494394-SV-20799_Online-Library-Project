<?php
session_start();

function logout()
{
  session_unset();
  session_destroy();

  header("Location: ../login/login.php");
  exit();
}

if (isset($_GET['logout'])) {
  logout();
}

if (!isset($_SESSION['username'])) {
  echo "<script>alert('Login First Before Rent'); window.location.href='../login/login.php';</script>";
  exit();
}

function getBookTitle($bookcode)
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "library";

  $conn = mysqli_connect($servername, $username, $password, $database);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $query = "SELECT JUDUL_BUKU FROM buku WHERE ID_BUKU = '$bookcode'";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit();
  }

  $row = mysqli_fetch_assoc($result);
  if ($row) {
    $judul_buku = $row['JUDUL_BUKU'];
  } else {
    echo "Error: Book not found";
    exit();
  }

  mysqli_close($conn);

  return $judul_buku;
}

function getReturnDate($loandate)
{
  $return_date = date('Y-m-d', strtotime($loandate . ' + 7 days'));

  return $return_date;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $bookcode = $_POST['bookcode'];
  $loandate = $_POST['loandate'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "library";

  $conn = mysqli_connect($servername, $username, $password, $database);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $query = "SELECT JUMLAH_BUKU FROM buku WHERE ID_BUKU = '$bookcode'";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit();
  }

  $row = mysqli_fetch_assoc($result);
  if ($row && isset($row['JUMLAH_BUKU'])) {
    $jumlah_buku = $row['JUMLAH_BUKU'];
  } else {
    echo "<script>alert('Error : Missing Statement. Please Fill the Blank'); window.location.href='rent.php';</script>";
    exit();
  }

  if ($jumlah_buku > 0) {
    $conn = mysqli_connect($servername, $username, $password, $database);
  
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
  
    $id_pinjam = uniqid();
  
    $username_peminjam = $_SESSION['username'];
  
    $insertQuery = "INSERT INTO pinjam (ID_PINJAM, ID_BUKU, ID_ANGGOTA, TANGGAL_PINJAM) VALUES ('$id_pinjam', '$bookcode', '$username_peminjam', '$loandate')";
  
    if (mysqli_query($conn, $insertQuery)) {
      $updateQuery = "UPDATE buku SET JUMLAH_BUKU = JUMLAH_BUKU - 1 WHERE ID_BUKU = '$bookcode'";
      mysqli_query($conn, $updateQuery);
    } else {
      echo "Error: " . mysqli_error($conn);
      exit();
    }
  
    mysqli_close($conn);
  } else {
    echo "<script>alert('Rent Failed: Book is not available'); window.location.href='rent.php';</script>";
    exit();
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <title>Rent</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css" />
  <!-- Boxicons CDN Link -->
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class="bx icon align-self-center"><img src="../assets/logo.png" width="28px" alt="" /></i>
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
        <a href="#">
          <i class="bx bx-calendar"></i>
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
          <a class="logout" href="?logout=true"><i class='bx bx-log-out' id="log_out"></i></a>
        </li>
      <?php endif; ?>
    </ul>
  </div>

  <div class="login">
    <div class="d-flex flex-row flex-wrap justify-content-evenly">
      <div class="p-0" id="title">
        <h1>ONLINE LIBRARY</h1>
        <p><img src="../assets/rent.svg" width="400px" alt="" /></p>
      </div>
      <div class="p-0" id="form">
        <h1 class="title">USER RENT</h1>
        <h2 class="subtitle">Welcome to the website</h2>
        <form method="POST">
          <p>
            <input type="text" id="name" name="name" placeholder="Name" style="color: #0f66b6" />
          </p>
          <p>
            <input type="text" id="bookcode" name="bookcode" placeholder="Book Code" style="color: #0f66b6" />
          </p>
          <p>
            <input type="date" id="loandate" name="loandate" placeholder="Loan Date" style="color: #0f66b6" />
          </p>
          <p><a><button class="btn btn-primary" type="submit"> RENT</button></a></p>
          <p><a class="btn btn-primary clear" onclick="clearOutputs()"> CLEAR</a></p>
        </form>
        <p class="output" id="titlespan">
            <?php
            // Tampilkan nama peminjam
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                echo "<span class='titlespan'>Rent Successful</span>";
            }
            ?>
        </p>
        <p class="output" id="nameOutput">
            <?php
            // Tampilkan nama peminjam
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                echo "<span>Name</span><br>" . $name;
            }
            ?>
        </p>
        <p class="output" id="titleOutput">
            <?php
            // Tampilkan judul buku berdasarkan kode buku yang diinputkan
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $bookcode = $_POST['bookcode'];
                echo "<span>Book Title</span><br>" . getBookTitle($bookcode); // Ganti dengan fungsi yang sesuai untuk mendapatkan judul buku berdasarkan kode buku
            }
            ?>
        </p>
        <p class="output" id="codeOutput">
            <?php
            // Tampilkan kode buku yang dipinjam
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $bookcode = $_POST['bookcode'];
                echo "<span>Book Code</span><br>" . $bookcode;
            }
            ?>
        </p>
        <p class="output" id="loanDateOutput">
            <?php
            // Tampilkan tanggal pinjam
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $loandate = $_POST['loandate'];
                echo "<span>Loan Date</span><br>" . $loandate;
            }
            ?>
        </p>
        <p class="output" id="returnDateOutput">
            <?php
            // Tampilkan tanggal kembali berdasarkan tanggal peminjaman
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $loandate = $_POST['loandate'];
                echo "<span>Return Date</span><br>" . getReturnDate($loandate); // Ganti dengan fungsi yang sesuai untuk mendapatkan tanggal kembali berdasarkan tanggal peminjaman
            }
            ?>
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
            <a href="../login/login.php">LOGIN</a>
            <a href="#">RENT</a>
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
    function clearOutputs() {
    var nameOutput = document.getElementById("nameOutput");
    var titleOutput = document.getElementById("titleOutput");
    var codeOutput = document.getElementById("codeOutput");
    var loanDateOutput = document.getElementById("loanDateOutput");
    var returnDateOutput = document.getElementById("returnDateOutput");
    var titlespan = document.getElementById("titlespan");

    nameOutput.innerHTML = "";
    titleOutput.innerHTML = "";
    codeOutput.innerHTML = "";
    loanDateOutput.innerHTML = "";
    returnDateOutput.innerHTML = "";
    titlespan.innerHTML = "";
}
  </script>
</body>

</html>
