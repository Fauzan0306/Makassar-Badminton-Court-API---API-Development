<?php
// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Mengambil nilai yang diinput dari form
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Melakukan validasi atau manipulasi data jika diperlukan

  // Menyimpan data ke database
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

  // Menjalankan query untuk memeriksa keberadaan username
$checkUsernameQuery = "SELECT * FROM user WHERE username = '$username'";
$result = $conn->query($checkUsernameQuery);

if ($result->num_rows > 0) {
  // Tambahkan pesan kesalahan
  $error_message = "Username sudah digunakan. Gunakan username lain.";

  // Kembali ke halaman login dengan membawa pesan kesalahan
  header("Location: daftar-index.php?error=" . urlencode($error_message));
  exit();
} else {
  // Jika username belum ada di database, jalankan query untuk menyimpan data
  $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

  if ($conn->query($sql) === TRUE) {
    // Jika pendaftaran berhasil, alihkan ke halaman login.html
    header("Location: login-index.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

  // Menutup koneksi
  $conn->close();
}
?>
