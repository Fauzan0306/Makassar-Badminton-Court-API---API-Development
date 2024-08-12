<?php

// Memeriksa apakah header "key" ada dalam request
if (!isset($_SERVER['HTTP_KEY'])) {
    http_response_code(401);
    echo "Unauthorized: Key is missing.";
    exit;
}

$key = $_SERVER['HTTP_KEY'];

// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "api_lap";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

$sql1 = "SELECT * FROM user WHERE key_token='$key' ";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // Periksa apakah ada parameter id_lap pada URL
    if (isset($_GET['id_lap'])) {
        $id_lap = $_GET['id_lap'];
        $sql = "SELECT *
            FROM lapangan
            INNER JOIN alamat ON lapangan.alamat_id = alamat.id_alamat
            INNER JOIN galery ON lapangan.galery_id = galery.id_galery
            INNER JOIN ulasan ON lapangan.id_lap = ulasan.id_lap
            INNER JOIN harga_sewa ON lapangan.id_lap = harga_sewa.id_lap
            INNER JOIN fasilitas ON lapangan.fas_id = fasilitas.id_fas
            WHERE lapangan.id_lap = $id_lap
            GROUP BY lapangan.id_lap";
    } else {
        // Jika tidak ada parameter id_lap, ambil semua data lapangan
        $sql = "SELECT *
            FROM lapangan
            INNER JOIN alamat ON lapangan.alamat_id = alamat.id_alamat
            INNER JOIN galery ON lapangan.galery_id = galery.id_galery
            INNER JOIN ulasan ON lapangan.id_lap = ulasan.id_lap
            INNER JOIN harga_sewa ON lapangan.id_lap = harga_sewa.id_lap
            INNER JOIN fasilitas ON lapangan.fas_id = fasilitas.id_fas
            GROUP BY lapangan.id_lap";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Membuat array untuk menyimpan data lapangan
        $lapanganArray = array();

        while ($row = $result->fetch_assoc()) {
            // Membuat array data lapangan
            $lapangan = array(
                "id_lap" => $row["id_lap"],
                "nama" => $row["nama"],
                "deskripsi" => $row["deskripsi"],
                "alamat" => array(
                    "jalan" => $row["jalan"],
                    "kec" => $row["kec"],
                    "kota" => $row["kota"],
                    "gmaps" => $row["gmaps"]
                ),
                "jam_operasional" => $row["jam_operasional"],
                "nomor_kontak" => $row["nomor_kontak"],
                "harga_per_jam" => $row["per_jam"],
                "peringkat" => $row["peringkat"],
                "galery" => array(
                    "gambar1" => $row["gambar1"],
                    "gambar2" => $row["gambar2"],
                    "gambar3" => $row["gambar3"]
                ),
                "kebijakan_pembatalan" => $row["kebijakan_pembatalan"]
            );

            // Membuat array "fasilitas"
            $fasilitasArray = array();

            // Memeriksa dan menambahkan setiap kolom "fasilitas" jika tersedia
            if (!empty($row["fas1"])) {
                $fasilitasArray["fas1"] = $row["fas1"];
            }

            if (!empty($row["fas2"])) {
                $fasilitasArray["fas2"] = $row["fas2"];
            }

            if (!empty($row["fas3"])) {
                $fasilitasArray["fas3"] = $row["fas3"];
            }

            if (!empty($row["fas4"])) {
                $fasilitasArray["fas4"] = $row["fas4"];
            }

            if (!empty($row["fas5"])) {
                $fasilitasArray["fas5"] = $row["fas5"];
            }

            // Menambahkan array "fasilitas" ke dalam data lapangan
            $lapangan["fasilitas"] = $fasilitasArray;

            // Query untuk mendapatkan ulasan berdasarkan id_lap
            $sql_ulasan = "SELECT id_lap, nama_orang, teks_ulasan FROM ulasan WHERE id_lap = " . $row["id_lap"];
            $result_ulasan = $conn->query($sql_ulasan);

            if ($result_ulasan->num_rows > 0) {
                // Membuat array untuk menyimpan data ulasan
                $ulasanArray = array();

                while ($row_ulasan = $result_ulasan->fetch_assoc()) {
                    // Membuat array data ulasan
                    $ulasan = array(
                        "nama" => $row_ulasan["nama_orang"],
                        "teks_ulasan" => $row_ulasan["teks_ulasan"]
                    );

                    // Menambahkan data ulasan ke dalam array
                    $ulasanArray[] = $ulasan;
                }

                // Menambahkan data ulasan ke dalam data lapangan
                $lapangan["ulasan"] = $ulasanArray;
            } else {
                // Jika tidak ada data ulasan
                $lapangan["ulasan"] = array();
            }

            // Menambahkan data lapangan ke dalam array
            $lapanganArray[] = $lapangan;
        }

        // Mengatur data status sebagai array
        $status = array(
            "code" => 200,
            "description" => "OK"
        );

        // Membuat array akhir yang berisi status dan data lapangan
        $response = array(
            "status" => $status,
            "results" => $lapanganArray
        );

        // Mengubah data menjadi format JSON
        $json = json_encode($response);

        // Mengirim response sebagai JSON
        header('Content-Type: application/json');
        echo $json;
    } else {
        // Jika tidak ada data lapangan
        $status = array(
            "code" => 404,
            "description" => "Not Found"
        );

        // Membuat array akhir yang berisi status dan pesan
        $response = array(
            "status" => $status,
            "message" => "Tidak ada data lapangan."
        );

        // Mengubah data menjadi format JSON
        $json = json_encode($response);

        // Mengirim response sebagai JSON dengan kode status HTTP 404 (Not Found)
        header('Content-Type: application/json');
        http_response_code(404);
        echo $json;
    }
} else {
    // Jika kunci tidak valid
    $status = array(
        "code" => 401,
        "description" => "Unauthorized"
    );

    // Membuat array akhir yang berisi status dan pesan
    $response = array(
        "status" => $status,
        "message" => "Unauthorized: Invalid key/token."
    );

    // Mengubah data menjadi format JSON
    $json = json_encode($response);

    // Mengirim response sebagai JSON dengan kode status HTTP 401 (Unauthorized)
    header('Content-Type: application/json');
    http_response_code(401);
    echo $json;
}

$conn->close();
?>
