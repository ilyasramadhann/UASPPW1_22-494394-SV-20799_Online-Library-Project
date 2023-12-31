# Online Library
 ### Ilyas Ramadhan
 ### 22/494394/SV/20799

## Penjelasan Umum Website
Online Library adalah website peminjaman buku pada perpustakaan berbasis online. Pada website ini, user dapat melakukan peminjaman buku berdasarkan buku yang diminati. Untuk menentukan minat user terhadap buku, disediakan deskripsi buku di halaman tertentu. Website ini dapat digunakan oleh masyarakat umum dengan mendaftar sebagai member terlebih dahulu jika ingin melakukan transaksi peminjaman buku. 

Website ini disesuaikan dengan kebutuhan clien yang ingin dengan website minimalis dan dapat bekerja baik dari segi front-end dan back-end. Selain itu, data dari pengguna juga ingin disimpan agar ada history data yang ingin ditinjau. Peminjaman buku bata waktunya juga sudah ditentukan oleh klien, dengan batas maksimal peminjaman buku adalah 7 hari.

Website Online Library yang kami buat dapat memberi solusi bagi member perpustakaan yang sedang ada kesibukan dan tidak sempat pergi ke perpustakaan karena suatu hal. Juga dapat memberi solusi bagi kaum mager yang ingin meminjam buku tanpa pergi ke perpustakaan. Nantinya buku akan dikirim ke rumah. 

Website sendiri terdiri dari 5 halaman yaitu home sebagai tampilan awal website, library tempat deskripsi buku dan detail buku, laman sign up untuk membuat aku, laman log in untuk masuk ke session sebagai user, dan laman rent untuk meminjam buku.

## Requirement Dasar
### 1. Prinsip Desain
- Konsistensi
  ```css
  #form input {
    width: 75%;
  }
  ```
  Semua tombol input di semua halaman termasuk sign up dan log in memiliki ukuran yang sama yaitu 75% dari ukuran div parent nya.

- Pemilihan warna
  Warna yang kami gunakan adalah 2 warna dasar yaitu cream, biru, dan putih. Cream dan putih hanya digunakan satu warna, untuk warna biru dibuat jadi beberapa warna.
  ```css
    :root {
      --white: #ffffff;
      --darkBlue: #1c00ca;
      --blue: #0f66b6;
      --lightBlue: #4f9ee8;
      --veryVeryLightBlue: #9cdeff;
    }
  ```

- Hierarki Penulisan
  Penulisan pada website dibuat berbeda antara title dan subtitle, serta paragraf. Ketiganya dibuat berbeda agar memudahkan user membaca.

  ### Screenshott
  
  ![image](https://github.com/ilyasramadhann/UASPPW1_22-494394-SV-20799_Online-Library-Project/assets/78364915/36bdc11a-c50b-45e2-ad94-d9ef63bf1d33)
![image](https://github.com/ilyasramadhann/UASPPW1_22-494394-SV-20799_Online-Library-Project/assets/78364915/e2543632-79d3-475e-aa5b-b6450ed171ba)
![image](https://github.com/ilyasramadhann/UASPPW1_22-494394-SV-20799_Online-Library-Project/assets/78364915/5600c95a-de4b-4837-8fd7-7e8a56d51a53)

### 2. Responsive
Website responsive dibuat untuk menyesuaikan device user dan mengutamakan kenyamanan user. Nantinya, ukuran dari bagian website akan menyesuaikan device karena website sudah memudahkan dengan penggunaan website dan javascript.

```html
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
```
Pada tampilan login diatas, jika ditampilkan pada windows akan muncul gambar seperti sebagai berikut :
![image](https://github.com/ilyasramadhann/UASPPW1_22-494394-SV-20799_Online-Library-Project/assets/78364915/7dff3e97-09c0-4bde-a485-916c3b02cb87)
Hal tersebut karena responsive yang ditulis dengan kode dibawah :
```css
@media (min-width: 760px) {
  .login #title img {
    width: 300px;
  }
  .login #form {
    width: 40%;
    margin-right: 25px;
  }
  .login #title {
    width: 50%;
  }
  .login #title h1 {
    margin-top: 50px;
    font-size: 36px;
  }
  .login #form .title {
    margin-top: 90px;
    font-size: 32px;
    font-weight: 600;
  }
  .login #form .subtitle {
    font-size: 15px;
    margin-bottom: 25px;
  }
  .login #form input {
    width: 75%;
    height: 34px;
    padding: 0 20px;
    margin: 5px 0;
  }
  .login #form button {
    font-size: 15px;
  }
  .login #form .keterangan {
    font-size: 15px;
  }
  .login #form .keterangan a {
    font-size: 15px;
  }
}
```

Jika pada handphone, ukuran akan langsung menyusut dan menyesuaikan ukuran device dengan tampilan dan kode berikut:
![image](https://github.com/ilyasramadhann/UASPPW1_22-494394-SV-20799_Online-Library-Project/assets/78364915/0ed1a020-ea00-45e1-951f-0b8e785d408a)

```css
.login {
  padding-top: 32px;
  position: relative;
  height: auto;
  top: 0;
  left: 78px;
  width: calc(100% - 78px);
  transition: all 0.5s ease;
  z-index: 2;
  background-color: #4f9ee8;
  font-family: "Poppins";
  text-align: center;
}
.login .d-flex {
  flex-direction: column;
  padding-bottom: 120px;
}
.login #title {
  width: 300px;
}
.login #title h1 {
  margin-top: 50px;
  margin: 0 5px;
  color: #ffffff;
  font-size: 30px;
  font-weight: bold;
}
.login #title p {
  margin-top: 39px;
}
.login #title img {
  width: 200px;
}
.login #form {
  width: 300px;
  background-color: #ffffff;
  margin: 0 10px;
}
.login #form .title {
  margin-top: 90px;
  color: #0f66b6;
  font-size: 25px;
  font-weight: 600;
}
.login #form .subtitle {
  color: #0f66b6;
  font-size: 12px;
  margin-bottom: 25px;
}
.login #form input {
  color: #0f66b6;
  width: 75%;
  height: 34px;
  background-color: #9cdeff;
  border-radius: 20px;
  border: none;
  padding: 0 20px;
  font-size: 12px;
}
::placeholder {
  color: #ffffff;
}
input:focus {
  outline-color: #4f9ee8;
}
.login #form button {
  color: #ffffff;
  width: 75%;
  height: 30px;
  background-color: #0f66b6;
  border-radius: 0;
  border: none;
  font-size: 12px;
  margin: 5px 0 15px 0;
}
.login #form .keterangan {
  font-size: 12px;
  text-align: left;
  margin-left: 12.5%;
  margin-right: 12.5%;
  margin-bottom: 50px;
}
.login #form .keterangan a {
  font-size: 12px;
  color: #1c00ca;
  text-align: left;
  text-decoration: none;
}
.login #form .keterangan a:hover {
  transition: all 0.4s ease;
  color: #9cdeff;
}
```

### 3. Feedback ke Pengguna
Terdapat feedback untuk pengguna, yang sama-sama menerapkan javascript
- Feedback pertama adalah alert yang muncul jika user masuk ke halaman rent tanpa melakukan login. Karena untuk melakukan peminjaman harus memiliki akun dan masuk ke session.
![image](https://github.com/ilyasramadhann/UASPPW1_22-494394-SV-20799_Online-Library-Project/assets/78364915/c3af540d-09c3-483d-a802-633d734b9276)

Jika user sudah login dan melakukan rent tapi ada data yang kosong, akan muncul alert data harus diisi semua.
![image](https://github.com/ilyasramadhann/UASPPW1_22-494394-SV-20799_Online-Library-Project/assets/78364915/50194b83-6ae8-4e64-a9db-a317df151f15)

- Feedback kedua adalah jika user melakukan rent/peminjaman, akan muncul data peminjam dan data buku yang dipinjam. Setelah user menekan rent dan telah mengisi semua data dengan benar, akan muncul data peminjam.
![image](https://github.com/ilyasramadhann/UASPPW1_22-494394-SV-20799_Online-Library-Project/assets/78364915/e687ac65-4ab8-429c-a375-dfdc4fdd8d3a)
Data tersebut diambil dari data hasil login dan data yang telah dimasukkan oleh user. Jika user melakukan peminjaman, jumlah buku di database secara akan otomatis berkurang satu.


### 4. Konten Dinamis dari Database
Konten dinamis ini menggunakan data dari database. Dalam website ini tabel library digunakan sebagai konten dinamis di hasil search query. Konten ini bisa melakukan sign up, log in, dan peminjaman buku sehingga terhubung ke database
- Konten dinamis pertama adalah sign up. Setelah user membuat akun dan berhasil, halaman akan diarahkan ke log in agar user melakukan log in. Berikut adalah kode php untuk sign up.
  ```php
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
  ```
  Tampilan Sign Up adalah sebagai berikut dan akan muncul beberapa aler jika sign up dengan username yang sudah dipakai.
  ![image](https://github.com/ilyasramadhann/UASPPW1_22-494394-SV-20799_Online-Library-Project/assets/78364915/cbb65910-65c1-484b-8539-c7c4635aaf6b)
  ![image](https://github.com/ilyasramadhann/UASPPW1_22-494394-SV-20799_Online-Library-Project/assets/78364915/521cc02f-45fb-4206-b45a-eef9eece7522)

- Kemudian ada library yang menerapkan kedinamisan dari database. Data deskripsi buku diambil dari database, sehingga bisa diubah dengan mudah melalui database tanpa mengganti di file php.
  Berikut adalah kode yang diperlukan untuk menjalankan deskripsi pada library
  ```php
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
  ```

  Kemudian ada script javascipt yang berisi kode untuk memanggil data deskripsi dari database:
  ```javascript
      <script>
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
          var new_display = "<div id='bookdesc' class='bookdesc1'><div id='title'>Book Title</div><div id='desc' class='titlebook1'><?php echo isset($book3['JUDUL_BUKU']) ? $book3['JUDUL_BUKU'] : ''; ?></div><div id='title'>Book Code</div><div id='desc' class='bookcode1'><?php echo isset($book3['ID_BUKU']) ? $book3['ID_BUKU'] : ''; ?></div><div id='title'>Author</div><div id='desc' class='author1'><?php echo isset($book3['PENULIS']) ? $book3['PENULIS'] : ''; ?></div><div id='title'>Sinopsis</div><div id='desc' class='sinopsis1'><?php echo isset($book3['SINOPSIS']) ? $book3['SINOPSIS'] : ''; ?></div></div>"
          if (document.getElementById("muncul3").innerHTML == "") {
            document.getElementById("muncul3").innerHTML = new_display;
          } else {
            document.getElementById("muncul3").innerHTML = "";
          }
        }
        function addDesc4(){
          var new_display = "<div id='bookdesc' class='bookdesc1'><div id='title'>Book Title</div><div id='desc' class='titlebook1'><?php echo isset($book4['JUDUL_BUKU']) ? $book4['JUDUL_BUKU'] : ''; ?></div><div id='title'>Book Code</div><div id='desc' class='bookcode1'><?php echo isset($book4['ID_BUKU']) ? $book4['ID_BUKU'] : ''; ?></div><div id='title'>Author</div><div id='desc' class='author1'><?php echo isset($book4['PENULIS']) ? $book4['PENULIS'] : ''; ?></div><div id='title'>Sinopsis</div><div id='title'>Sinopsis</div><div id='desc' class='sinopsis1'><?php echo isset($book4['SINOPSIS']) ? $book4['SINOPSIS'] : ''; ?></div></div>"
          if (document.getElementById("muncul4").innerHTML == "") {
            document.getElementById("muncul4").innerHTML = new_display;
          } else {
            document.getElementById("muncul4").innerHTML = "";
          }
        }
    </script>
  ```

  Berikut adalah tampilan library yang mengambil data dari database
  ![image](https://github.com/ilyasramadhann/UASPPW1_22-494394-SV-20799_Online-Library-Project/assets/78364915/5c742485-eac3-4a67-8ac2-941735f5ff2e)
  ![image](https://github.com/ilyasramadhann/UASPPW1_22-494394-SV-20799_Online-Library-Project/assets/78364915/818f620a-ea67-4b41-9830-d3325552a3df)

