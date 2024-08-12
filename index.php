<?php

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
  <title>Makassar Badminton Court API</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
  <head>
  <link rel="icon" href="api-logo.png" type="image/png">
  </head>
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
  <header class="bg-success text-white py-5">
    <div class="container text-center">
      <h2>Makassar Badminton</h2>
      <h3>Court API</h3>
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
  <div class="container mt-5">
    <section id="endpoint3">
      <h2>Endpoint 1</h2>
      <h2 class="text-success">Mengambil semua data lapangan</h2>
      <br>
      <div class="card">
        <div class="card-header bg-success text-white">
          Request:
        </div>
        <div class="card-body">
          <pre><code>URL: http://localhost/API/all.php<br>
Methode: GET</code></pre>
            <table class="table">
            <thead>
              <tr>
                <th>Methode</th>
                <th>Parameter</th>
                <th>Wajib</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>GET/HEAD</td>
                <td>key</td>
                <td><span class="text-danger">Wajib</span></td>
                <td>API key/token</td>
              </tr>

              <tr>
                <td>GET</td>
                <td>id_lap</td>
                <td><span class="text-danger">Tidak Wajib</span></td>
                <td>ID_lapangan</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <br>
      <div class="card">
        <div class="card-header bg-success text-white">
          Response:
        </div>
        <div class="card-body scroll-box text-danger">
          <pre><code>
          [
                "status": {
            "code": 200,
            "description": "OK"
            },
            "results": [
                {
                    "id_lap": "1",
                    "nama": "Hidayat Badminton Hall",
                    "deskripsi": "Terdapat 6 lapangan badminton, nyaman, luas dan bersih, juga parkiran luas",
                    "alamat": {
                        "jalan": "Perum. Bumi Tamalanrea Permai, Blk. H, Tamalanrea",
                        "kec": "Tamalanrea",
                        "kota": "Makassar, Sulawesi Selatan",
                        "gmaps": "https://goo.gl/maps/QA3bUFt2FrYgQ53K7"
                    },
                    "jam_operasional": "Senin-Minggu 07:00 - 23:00",
                    "nomor_kontak": "+62 813-4676-9746",
                    "harga_per_jam": "45000",
                    "fasilitas": {
                        "fas1": "Penjual Makanan",
                        "fas2": "Penjual Minuman",
                        "fas3": "Musholla",
                        "fas4": "Parkiran",
                        "fas5": "Toilet"
                    },
                    "peringkat": "8.5/10",
                    "galery": {
                        "gambar1": "Hidayat.jpg",
                        "gambar2": "Hidayat2.jpg",
                        "gambar3": "Hidaya3.jpg"
                    },
                    "kebijakan_pembatalan": "Pembatalan reservasi dapat dilakukan hingga 24 jam sebelum jadwal sewa. Jika pembatalan dilakukan kurang dari 24 jam sebelum jadwal sewa, maka akan dikenakan biaya pembatalan sebesar 35% dari harga sewa.",
                    "ulasan": [
                        {
                            "nama": "Yusdar",
                            "teks_ulasan": "Saya sangat senang bermain di Hidayat Badminton Hall. Lapangan-lapangannya sangat nyaman dan bersih. Fasilitas parkiran yang luas juga sangat membantu. Sangat direkomendasikan!"
                        },
                        {
                            "nama": "Zaedil",
                            "teks_ulasan": "Tempat yang luar biasa untuk bermain bulu tangkis. Stafnya sangat ramah dan lapangan selalu dalam kondisi baik. Saya sering menggunakan paket member bulanan, sangat terjangkau dan hemat!"
                        }
                    ]
                },
                ....
          ]
          </code></pre>
        </div>
      </div>
    </section>
  </div>
  <br>

    <div class="container mt-5">
    <section id="endpoint3">
      <h2>Endpoint 2</h2>
      <h2 class="text-success">Mengambil data kecamatan</h2>
      <br>
      <div class="card">
        <div class="card-header bg-success text-white">
          Request:
        </div>
        <div class="card-body">
          <pre><code>URL: http://localhost/API/kecamatan.php<br>
Methode: GET</code></pre>
          <table class="table">
            <thead>
              <tr>
                <th>Methode</th>
                <th>Parameter</th>
                <th>Wajib</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>GET/HEAD</td>
                <td>key</td>
                <td><span class="text-danger">Wajib</span></td>
                <td>API key/token</td>
              </tr>

              <tr>
                <td>GET/HEAD</td>
                <td>id_alamat</td>
                <td><span class="text-danger">Tidak Wajib</span></td>
                <td>ID_alamat</td>
              </tr>
            </tbody>
          </table>
          <br>
        </div>
      </div>
      <br>
      <div class="card">
        <div class="card-header bg-success text-white">
          Response:
        </div>
        <div class="card-body scroll-box text-danger">
          <pre><code>
          [
              "status": {
                  "code": 200,
                  "description": "OK"
              },
              "results": [
                  {
                      "id_alamat": "1",
                      "kec": "Tamalanrea"
                  },
                  {
                      "id_alamat": "3",
                      "kec": "Rappocini"
                  },
                  {
                      "id_alamat": "4",
                      "kec": "Bontoala"
                  }
              ]
          ]
          </code></pre>
        </div>
      </div>
    </section>
  </div>
  <br>

    <div class="container mt-5">
    <section id="endpoint3">
      <h2>Endpoint 3</h2>
      <h2 class="text-success">Mengambil detail lapangan</h2>
      <br>
      <div class="card">
        <div class="card-header bg-success text-white">
          Request:
        </div>
        <div class="card-body">
          <pre><code>URL: http://localhost/API/detailslap.php<br>Methode: GET</code></pre>
          <table class="table">
            <thead>
              <tr>
                <th>Methode</th>
                <th>Parameter</th>
                <th>Wajib</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>GET/HEAD</td>
                <td>key</td>
                <td><span class="text-danger">Wajib</span></td>
                <td>API key/token</td>
              </tr>
              <tr>
                <td>GET</td>
                <td>nama</td>
                <td><span class="text-danger">wajib / tidak wajib</span></td>
                <td>Nama Lapangan</td>
              </tr>
              <tr>
                <td>GET</td>
                <td>kecamatan</td>
                <td><span class="text-danger">wajib / tidak wajib</span></td>
                <td>Nama Kecamatan</td>
              </tr>
              <tr>
                <td>GET</td>
                <td>harga_min</td>
                <td><span class="text-danger">wajib / tidak wajib</span></td>
                <td>Harga Minimal</td>
              </tr>
              <tr>
                <td>GET</td>
                <td>harga_max</td>
                <td><span class="text-danger">wajib / tidak wajib</span></td>
                <td>Harga Maksimal</td>
              </tr>
            </tbody>
          </table>
          <p>Masukkan Minimal 1 Parameter</p>
        </div>
      </div>
      <br>
      <div class="card">
        <div class="card-header bg-success text-white">
          Response:
        </div>
        <div class="card-body scroll-box text-danger">
          <pre><code>
          [
              "status": {
                  "code": 200,
                  "description": "OK"
              },
              "results": [
                  {
                      "id_lap": "4",
                      "nama": "GOR Anugrah",
                      "deskripsi": "Terdapat 8 lapangan beton dan 6 lapangan karpet badminton, nyaman, luas dan bersih, juga parkiran luas",
                      "alamat": {
                          "jalan": "Jl. Sultan Dg Raja",
                          "kec": "Bontoala",
                          "kota": "Makassar",
                          "gmaps": "https://goo.gl/maps/Qsqa8pjRbRcwSqK87"
                      },
                      "jam_operasional": "Senin-Minggu 09:00 - 23:00",
                      "nomor_kontak": "+62 877-0045-6641",
                      "harga_per_jam": "50000",
                      "fasilitas": {
                          "fas1": "Penjual Makanan",
                          "fas2": "Penjual Minuman",
                          "fas3": "Musholla",
                          "fas4": "Parkiran",
                          "fas5": "Toilet"
                      },
                      "peringkat": "8.0/10",
                      "galery": {
                          "gambar1": "Anugerah.png",
                          "gambar2": "Anugerah2.png",
                          "gambar3": "Anugerah3.png"
                      },
                      "kebijakan_pembatalan": "Pembatalan reservasi dapat dilakukan hingga 48 jam sebelum jadwal sewa."
                  }
              ]
          ]
          </code></pre>
        </div>
      </div>
    </section>
  </div>

  </main>

  </main>

  <footer class="bg-success text-white py-3">
    <div class="container text-center">
      <p>&copy; 2023 Makassar Badminton Court API</p>
    </div>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
