<!DOCTYPE html>
<html>
  <title>Login Akun</title>
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
<head>
</head>
<body>
  <div class="container">
    <h2>Form Login</h2>
    <form action="login.php" method="post">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Masukkan username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
      </div>
      <div class="form-group">
        <button type="submit">Login</button>
      </div>

      <?php
      // Memeriksa apakah ada pesan kesalahan yang diterima dari halaman login.php
      if (isset($_GET['error'])) {
        $error_message = $_GET['error'];
        echo '<div class="alert alert-danger">
        <strong>Upss! </strong>' . $error_message . '</div>';
      }
      ?>
      <div class="register-link">
        <p>Tidak punya akun? <a href="daftar-index.php">Daftar</a></p>
      </div>
    </form>
  </div>
</body>

</html>
