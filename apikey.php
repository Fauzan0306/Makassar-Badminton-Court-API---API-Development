<?php

$api_key = "";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];

    $api_key = md5($username);

    $servername = "localhost"; // Ganti dengan nama server database Anda
    $username_db = "root"; // Ganti dengan nama pengguna database Anda
    $password_db = "12345"; // Ganti dengan kata sandi database Anda
    $database = "api_lap"; // Ganti dengan nama database Anda

    // Membuat koneksi ke database
    $conn = new mysqli($servername, $username_db, $password_db, $database);

    // Memeriksa koneksi
    if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
    }

    // Menjalankan query untuk memeriksa apakah username dan password valid
    $sql = "UPDATE user SET key_token='$api_key' WHERE username= '$username'";
    $result = $conn->query($sql);
}

session_start();
// Memeriksa apakah pengguna telah login
if (isset($_SESSION['username'])) {
// Pengguna telah login, lakukan tindakan yang sesuai
$username = $_SESSION['username'];
} else {
// Pengguna belum login, arahkan ke halaman login
header("Location: login-index.php");
exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>API Documentation</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
  <link rel="icon" href="api-logo.png" type="image/png">
  </head>
  <style>
    link[rel="icon"] {
      width: 50px;
      height: 50px;
    }
</style>
</head>

<body>
  <header class="bg-success text-white py-5">
    <div class="container text-center">
    <h2>Makassar Badminton Court</h2>
    <h3>API Key</h3>
    </div>
  </header>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.php">Beranda</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-success" href="apikey.php">API KEY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-success"><?php echo "Halo, " . $_SESSION['username'] . "!"; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-success" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>  
  </nav>

  <main class="container my-5">
    <h2>Api Key</h2>
    <p class="mb-4">Gunakan API Key ini untuk menggunakan Makassar Badminton Court API. 
      Untuk informasi lebih lanjut mengenai cara menggunakan Makassar Badminton Court API, silakan baca dokumentasi.</p>
    <form action="apikey.php" method="POST">
        <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
        <button type="submit" name="submit" class="btn btn-success">Dapatkan API Key/token</button>
    </form>
    <?php if (!empty($api_key)) { ?>
        <div class="mt-3">
            <input type="text" class="form-control" value="<?php echo $api_key; ?>" style="width: <?php echo strlen($api_key) * 9; ?>px;" readonly>
        </div>
    <?php } ?>
</main>

  <br> <br> <br> <br> <br>
  <footer class="bg-success text-white py-3">
    <div class="container text-center">
      <p>&copy; 2023 Makassar Badminton Court API</p>
    </div>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

