<?php

// Memeriksa apakah header "key" ada dalam request
if (!isset($_SERVER['HTTP_KEY'])) {
    http_response_code(401);
    echo "Unauthorized: Key is missing.";
    exit;
}

$key = $_SERVER['HTTP_KEY'];

// Menghubungkan ke database

// Endpoint untuk mengambil data kecamatan
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Menghubungkan ke database (ganti dengan koneksi yang sesuai)
    $servername = "localhost";
    $username = "root";
    $password = "12345";
    $dbname = "api_lap";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Cek apakah ada parameter id_alamat yang dikirimkan
    if (isset($_GET['id_alamat']) && !empty($_GET['id_alamat'])) {
        $id_alamat = $_GET['id_alamat'];
        // Query untuk mengambil data kecamatan berdasarkan id_alamat
        $sql_kecamatan = "SELECT id_alamat, kec FROM alamat WHERE id_alamat = '$id_alamat'";
    } else {
        // Query untuk mengambil data kecamatan beserta id_alamat (menggunakan GROUP BY) dan mengurutkan berdasarkan id_alamat
        $sql_kecamatan = "SELECT MIN(id_alamat) AS id_alamat, kec FROM alamat GROUP BY kec ORDER BY id_alamat ASC"; // Ganti 'kecamatan' dengan nama tabel kecamatan di basis data Anda
    }

    $result_kecamatan = $conn->query($sql_kecamatan);

    if ($result_kecamatan->num_rows > 0) {
        // Membuat array untuk menyimpan data kecamatan
        $kecamatanArray = array();

        while ($row_kecamatan = $result_kecamatan->fetch_assoc()) {
            // Menambahkan data kecamatan beserta id_alamat ke dalam array
            $kecamatan = array(
                "id_alamat" => $row_kecamatan["id_alamat"],
                "kec" => $row_kecamatan["kec"]
            );

            $kecamatanArray[] = $kecamatan;
        }

        // Mengubah data menjadi format JSON
        $json_kecamatan = json_encode($kecamatanArray);

        // Menambahkan status dalam respons JSON
        $response = array(
            "status" => array(
                "code" => 200,
                "description" => "OK"
            ),
            "results" => json_decode($json_kecamatan) // Konversi JSON ke array untuk data kecamatan
        );

        // Mengirim response sebagai JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Jika tidak ada data kecamatan
        $response = array(
            "status" => array(
                "code" => 404,
                "description" => "Not Found"
            ),
            "message" => "Tidak ada data kecamatan."
        );
        echo json_encode($response);
    }

    $conn->close();
}
?>
