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

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'library';

$conn = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

$query = "SELECT nama_anggota FROM anggota WHERE username = '$username'";

$result = mysqli_query($conn, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $namaAnggota = $row['nama_anggota'];
    } else {
        $namaAnggota = 'Guest';
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

$query1 = "SELECT * FROM buku WHERE ID_BUKU = 'BK001'";
$result1 = $conn->query($query1);
$book1 = ($result1->num_rows > 0) ? $result1->fetch_assoc() : null;

$query2 = "SELECT * FROM buku WHERE ID_BUKU = 'BK002'";
$result2 = $conn->query($query2);
$book2 = ($result2->num_rows > 0) ? $result2->fetch_assoc() : null;

$query3 = "SELECT * FROM buku WHERE ID_BUKU = 'BK003'";
$result3 = $conn->query($query3);
$book3 = ($result3->num_rows > 0) ? $result3->fetch_assoc() : null;

$query4 = "SELECT * FROM buku WHERE ID_BUKU = 'BK004'";
$result4 = $conn->query($query4);
$book4 = ($result4->num_rows > 0) ? $result4->fetch_assoc() : null;

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Library</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
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
          <a href="#">
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

    <div class="main">
      <div class="mainflex d-flex flex-column">
        <div class="d-flex flex-row" id="top">
          <div class="p-2" id="title">
            <h1>Library Here!</h1>
            <p class="subtitle">Have you read the book today?</p>
            <p class="img">
              <img src="../assets/books2.png" width="408px" alt="" />
            </p>
          </div>
          <div class="p-2" id="member">
            <div class="d-flex justify-content-between">
              <div class="p-0">
                <img src="../assets/sim.png" width="38px" alt="" />
              </div>
              <div class="p-0">
                <img src="../assets/signal.svg" width="38px" alt="" />
              </div>
            </div>
            <div class="d-flex justify-content-between title">
              <div class="p-0">
                <span>Name</span>
              </div>
              <div class="p-0">
                <span>Username</span>
              </div>
            </div>
            <?php if (isset($_SESSION['username'])) : ?>
            <div class="d-flex justify-content-between tdata">
              <div class="p-0">
                <span class="name"><?php echo $namaAnggota; ?></span>
              </div>
              <div class="p-0">
                <span class="username"><?php echo $_SESSION['username']; ?></span>
              </div>
            </div>
          <?php else : ?>
            <div class="d-flex justify-content-between tdata">
              <div class="p-0">
                <span class="name">Guest</span>
              </div>
              <div class="p-0">
                <span class="username">Guest</span>
              </div>
            </div>
          <?php endif; ?>
            <p>
              <span class="ket1">Kartu Anggota</span><br />
              <span>Perpustakaan Nasional</span>
            </p>
          </div>
        </div>
        <div class="d-flex flex-column flex-grow-1 desc">
          <div class="p-2 descBook" id="descbook1">
            <div class="d-flex flex-row align-items-center justify-content-center">
              <div class="p-0 align-self-center">
                <p><img src="../assets/laskarpelangi.jpg" width="120px" alt="" /></p>
              </div>
              <div class="p-0">
                <span class="title">Laskar Pelangi</span><br />
                <span class="author">Andrea Hirata</span>
              </div>
              <div class="ms-auto p-0">
                <p>
                <a href="#descbook1" onclick="addDesc1()" class="btn1"><button class="btn btn-primary">DETAILS</button></a>
                </p>
              </div>
            </div>
          </div>
          <div id="muncul1"></div>
          <div class="p-2 descBook" id="descbook2">
            <div class="d-flex flex-row align-items-center justify-content-center">
              <div class="p-0 align-self-center">
                <p><img src="../assets/rindu.jpg" width="120px" alt="" /></p>
              </div>
              <div class="p-0">
                <span class="title">Rindu</span><br />
                <span class="author">Tere Liye</span>
              </div>
              <div class="ms-auto p-0">
                <p>
                  <a href="#descbook2" onclick="addDesc2()" class="btn2"><button class="btn btn-primary">DETAILS</button></a>
                </p>
              </div>
            </div>
          </div>
          <div id="muncul2"></div>
          <div class="p-2 descBook" id="descbook3">
            <div class="d-flex flex-row align-items-center justify-content-center">
              <div class="p-0 align-self-center">
                <p><img src="../assets/bumi.jpg" width="120px" alt="" /></p>
              </div>
              <div class="p-0">
                <span class="title">Bumi</span><br />
                <span class="author">Tere Liye</span>
              </div>
              <div class="ms-auto p-0">
                <p>
                <a href="#descbook3" onclick="addDesc3()" class="btn3"><button class="btn btn-primary">DETAILS</button></a>
                </p>
              </div>
            </div>
          </div>
          <div id="muncul3"></div>
          <div class="p-2 descBook" id="descbook4">
            <div class="d-flex flex-row align-items-center justify-content-center">
              <div class="p-0 align-self-center">
                <p><img src="../assets/mmj.jpg" width="120px" alt="" /></p>
              </div>
              <div class="p-0">
                <span class="title">Marmut Merah Jambu</span><br />
                <span class="author">Raditya Dika</span>
              </div>
              <div class="ms-auto p-0">
                <p>
                <a href="#descbook4" onclick="addDesc4()"class="btn4"><button class="btn btn-primary">DETAILS</button></a>
                </p>
              </div>
            </div>
          </div>
          <div id="muncul4"></div>
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
              <a href="#">LIBRARY</a>
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
      function addDesc1(){
        var new_display = "<div id='bookdesc' class='bookdesc1'><div id='title'>Book Title</div><div id='desc' class='titlebook1'><?php echo isset($book1['JUDUL_BUKU']) ? $book1['JUDUL_BUKU'] : ''; ?></div><div id='title'>Book Code</div><div id='desc' class='bookcode1'><?php echo isset($book1['ID_BUKU']) ? $book1['ID_BUKU'] : ''; ?></div><div id='title'>Author</div><div id='desc' class='author1'><?php echo isset($book1['PENULIS']) ? $book1['PENULIS'] : ''; ?></div><div id='title'>Sinopsis</div><div id='desc' class='sinopsis1'><?php echo isset($book1['SINOPSIS']) ? $book1['SINOPSIS'] : ''; ?></div></div>"
        if (document.getElementById("muncul1").innerHTML == "") {
          document.getElementById("muncul1").innerHTML = new_display;
        } else {
          document.getElementById("muncul1").innerHTML = "";
        }
      }
      function addDesc2(){
        var new_display = "<div id='bookdesc' class='bookdesc1'><div id='title'>Book Title</div><div id='desc' class='titlebook1'><?php echo isset($book2['JUDUL_BUKU']) ? $book2['JUDUL_BUKU'] : ''; ?></div><div id='title'>Book Code</div><div id='desc' class='bookcode1'><?php echo isset($book2['ID_BUKU']) ? $book2['ID_BUKU'] : ''; ?></div><div id='title'>Author</div><div id='desc' class='author1'><?php echo isset($book2['PENULIS']) ? $book2['PENULIS'] : ''; ?></div><div id='title'>Sinopsis</div><div id='desc' class='sinopsis1'><?php echo isset($book2['SINOPSIS']) ? $book2['SINOPSIS'] : ''; ?></div></div>"
        if (document.getElementById("muncul2").innerHTML == "") {
          document.getElementById("muncul2").innerHTML = new_display;
        } else {
          document.getElementById("muncul2").innerHTML = "";
        }
      }
      function addDesc3(){
        var new_display = "<div id='bookdesc' class='bookdesc1'><div id='title'>Book Title</div><div id='desc' class='titlebook1'><?php echo isset($book3['JUDUL_BUKU']) ? $book3['JUDUL_BUKU'] : ''; ?></div><div id='title'>Book Code</div><div id='desc' class='bookcode1'><?php echo isset($book3['ID_BUKU']) ? $book3['ID_BUKU'] : ''; ?></div><div id='title'>Author</div><div id='desc' class='author1'><?php echo isset($book3['PENULIS']) ? $book3['PENULIS'] : ''; ?></div><div id='title'>Sinopsis</div><div id='desc' class='sinopsis1'>Novel ini mengisahkan tentang petualangan 3 remaja yang berusia 15 tahun bernama Raib, Ali dan Seli. Namun mereka bukanlah remaja biasa, melainkan remaja yang memiliki kekuatan khusus seperti Raib yang bisa menghilang, Seli yang bisa mengeluarkan petir dan Ali seorang pelajar yang sangat jenius. Petualangan menjelajah dunia paralel mereka dimulai dari sini, dunia paralel yang pertama mereka jelajahi adalah Klan Bulan. \r\nTetapi mereka tidak hanya sekedar menjelajah saja, melainkan mereka harus bertarung untuk menyelamatkan dunia paralel dari orang-orang jahat. Orang-orang jahat tersebut yakni bernama Tamus. Tamus memiliki ambisi untuk menguasai dunia, oleh karena itu ia berusaha untuk membebaskan seorang pangeran yang sangat kuat dan memiliki ambisi yang sama. Pangeran tersebut sedang dipenjara yang disebut \"Penjara Bayangan dibawah Bayangan\". Pangeran tersebut bernama Si Tanpa Mahkota.</div></div>"
        if (document.getElementById("muncul3").innerHTML == "") {
          document.getElementById("muncul3").innerHTML = new_display;
        } else {
          document.getElementById("muncul3").innerHTML = "";
        }
      }
      function addDesc4(){
        var new_display = "<div id='bookdesc' class='bookdesc1'><div id='title'>Book Title</div><div id='desc' class='titlebook1'><?php echo isset($book4['JUDUL_BUKU']) ? $book4['JUDUL_BUKU'] : ''; ?></div><div id='title'>Book Code</div><div id='desc' class='bookcode1'><?php echo isset($book4['ID_BUKU']) ? $book4['ID_BUKU'] : ''; ?></div><div id='title'>Author</div><div id='desc' class='author1'><?php echo isset($book4['PENULIS']) ? $book4['PENULIS'] : ''; ?></div><div id='title'>Sinopsis</div><div id='desc' class='sinopsis1'>Suatu ketika Dika mengunjungi rumah Anjani Dina, ia adalah cinta pertamanya saat sekolah di bangku SMA. Saat berkunjung ke rumah Anjani, Dika membawa kerajinan tangan berupa seribu burung bangau dari kertas origami di tangan kanannya.\r\n\r\nSedangkan, di tangan kirinya Dika juga membawakan undangan pernikahan Anjani. Saat itu, kedatangannya diteima dengan baik oleh Bapak Anjani. Hanya saja, beliau sedikit curiga bahwa Dika ingin menggagalkan pernikahan anaknya.\r\n\r\nTetapi, Dika menjelaskan bahwa tujuannya ke rumah Anjani bukan untuk merusak acara pernikahan.\r\n\r\nDika menceritakan kepada Bapak Anjani, dahulu saat SMA memang ia jatuh cinta secara diam-diam kepada Anjani. Hingga Dika dan dua sahabatnya yaitu Bertus dan Cindy membuat grup tiga sekawan yang sering melakukan tindakan penyelidikan atau detektif.\r\n\r\nTetapi, tiga sekawan ini mengalami kesulitan dalam memecahkan masalah yang cukup sulit yaitu permasalahan grafiti tembok sekolah.\r\n\r\nTerdapat tulisan grafiti yang dianggap sebagai bentuk ancaman kepada Kepala Sekolah. Selama bertahun-tahun sampai lulus sekolah, Dika masih penasaran dengan gambar tersebut. Ternyata grafiti itu bukanlah gambar seorang iblis. Tetapi, merupakan gambar marmut yang bentuknya mirip seperti handuk yang diberikan oelh Cindy.\r\n\r\nKasus grafity pertama kali juga disampaikan oleh Cindy, Dika dan Bertus yang meneliti gambar tersebut dengan memahami per dua kata.\r\n\r\nTernyata setelah ditelusuri grafiti tersebut dibuat oleh Cindy sebagai surat cinta. Menurutnya cinta itu seperti marmut merah jambu yang berlarian kesana kemari tanpa berhenti.</div></div>"
        if (document.getElementById("muncul4").innerHTML == "") {
          document.getElementById("muncul4").innerHTML = new_display;
        } else {
          document.getElementById("muncul4").innerHTML = "";
        }
      }
    </script>
  </body>
</html>
