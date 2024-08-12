<!DOCTYPE html>
<html>
<head>
  <title>Daftar Akun</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="api-logo.png" type="image/png">
  <style>

    link[rel="icon"] {
      width: 50px;
      height: 50px;
    }

    .scroll-box {
      max-height: 200px; /* Set the desired height */
      overflow-y: scroll; /* Enable vertical scrolling */
    }
</style>
</head>
<body>
  <div class="container">
    <h2>Form Pendaftaran</h2>
    <form action="daftar.php" method="post">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Masukkan username" required>
        <?php
      // Memeriksa apakah ada pesan kesalahan yang diterima dari halaman login.php
      if (isset($_GET['error'])) {
        $error_message = $_GET['error'];
        echo '<p class="error-message">' . $error_message . '</p>';
      }
      ?>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
      </div>
      
      <div class="form-group">
        <button type="submit">Daftar</button>
      </div>
      <div class="form-group register-link">
        <p>Sudah punya akun? <a href="login-index.php">Masuk</a></p>
      </div>
    </form>
  </div>
</body>
</html>
