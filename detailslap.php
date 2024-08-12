<?php

// Memeriksa apakah header "key" ada dalam request
if (!isset($_SERVER['HTTP_KEY'])) {
    http_response_code(401);
    echo "Unauthorized: Key tidak ditemukan.";
    exit;
}

$key = $_SERVER['HTTP_KEY'];

// Menghubungkan ke database

// Endpoint untuk mengambil data lapangan dengan parameter pencarian
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

    // Menerima input dari query string
    $nama = isset($_GET['nama']) ? $_GET['nama'] : null;
    $kecamatan = isset($_GET['kecamatan']) ? $_GET['kecamatan'] : null;
    $harga_min = isset($_GET['harga_min']) ? $_GET['harga_min'] : null;
    $harga_max = isset($_GET['harga_max']) ? $_GET['harga_max'] : null;

    // Query untuk mengambil data lapangan berdasarkan parameter yang diberikan
    $sql_lapangan = "SELECT *
                     FROM lapangan
                     INNER JOIN alamat ON lapangan.alamat_id = alamat.id_alamat
                     INNER JOIN harga_sewa ON lapangan.id_lap = harga_sewa.id_lap
                     INNER JOIN fasilitas ON lapangan.fas_id = fasilitas.id_fas
                     INNER JOIN galery ON lapangan.galery_id = galery.id_galery
                     WHERE 1"; // Query dasar

    // Menambahkan kondisi ke dalam query berdasarkan parameter yang diberikan
    if (!empty($nama)) {
        $sql_lapangan .= " AND lapangan.nama LIKE '%$nama%'";
    }

    if (!empty($kecamatan)) {
        $sql_lapangan .= " AND alamat.kec = '$kecamatan'";
    }

    if (!empty($harga_min) && is_numeric($harga_min)) {
        $sql_lapangan .= " AND harga_sewa.per_jam >= $harga_min";
    }

    if (!empty($harga_max) && is_numeric($harga_max)) {
        $sql_lapangan .= " AND harga_sewa.per_jam <= $harga_max";
    }

    // Mengambil data hanya jika ada parameter yang dimasukkan
    if ($nama || $kecamatan || ($harga_min && $harga_max)) {
        // Eksekusi query
        $result_lapangan = $conn->query($sql_lapangan);

        if ($result_lapangan->num_rows > 0) {
            // Query untuk mendapatkan data ulasan berdasarkan id_lap
            $sql_ulasan = "SELECT id_lap, nama_orang, teks_ulasan FROM ulasan WHERE id_lap = ?"; // Gunakan placeholder "?" untuk mencegah SQL injection
            $stmt_ulasan = $conn->prepare($sql_ulasan);
            $stmt_ulasan->bind_param("i", $id_lap); // Bind parameter dengan tipe data (integer)

            // Membuat array untuk menyimpan data lapangan
            $lapanganArray = array();

            while ($row_lapangan = $result_lapangan->fetch_assoc()) {
                // Menambahkan data lapangan ke dalam array
                $lapangan = array(
                    "id_lap" => $row_lapangan["id_lap"],
                    "nama" => $row_lapangan["nama"],
                    "deskripsi" => $row_lapangan["deskripsi"],
                    "alamat" => array(
                        "jalan" => $row_lapangan["jalan"],
                        "kec" => $row_lapangan["kec"],
                        "kota" => $row_lapangan["kota"],
                        "gmaps" => $row_lapangan["gmaps"]
                    ),
                    "jam_operasional" => $row_lapangan["jam_operasional"],
                    "nomor_kontak" => $row_lapangan["nomor_kontak"],
                    "harga_per_jam" => $row_lapangan["per_jam"],
                    "fasilitas" => array(
                        "fas1" => $row_lapangan["fas1"],
                        "fas2" => $row_lapangan["fas2"],
                        "fas3" => $row_lapangan["fas3"],
                        "fas4" => $row_lapangan["fas4"],
                        "fas5" => $row_lapangan["fas5"]
                    ),
                    "peringkat" => $row_lapangan["peringkat"],
                    "galery" => array(
                        "gambar1" => $row_lapangan["gambar1"], 
                        "gambar2" => $row_lapangan["gambar2"],
                        "gambar3" => $row_lapangan["gambar3"]
                    ),
                    "kebijakan_pembatalan" => $row_lapangan["kebijakan_pembatalan"]
                );

                // Bind parameter untuk query ulasan
                $id_lap = $row_lapangan["id_lap"];
                $stmt_ulasan->execute();

                // Mendapatkan data ulasan dari hasil query
                $result_ulasan = $stmt_ulasan->get_result();

                if ($result_ulasan->num_rows > 0) {
                    // Membuat array untuk menyimpan data ulasan
                    $ulasanArray = array();

                    while ($row_ulasan = $result_ulasan->fetch_assoc()) {
                        // Menambahkan data ulasan ke dalam array
                        $ulasan = array(
                            "nama" => $row_ulasan["nama_orang"],
                            "teks_ulasan" => $row_ulasan["teks_ulasan"]
                        );

                        $ulasanArray[] = $ulasan;
                    }

                    // Menambahkan data ulasan ke dalam data lapangan
                    $lapangan["ulasan"] = $ulasanArray;
                } else {
                    // Jika tidak ada data ulasan
                    $lapangan["ulasan"] = array();
                }

                $lapanganArray[] = $lapangan;
            }

            // Menutup statement ulasan
            $stmt_ulasan->close();

            // Mengubah data menjadi format JSON
            $json_lapangan = json_encode($lapanganArray);

            // Menambahkan status dalam respons JSON
            $response = array(
                "status" => array(
                    "code" => 200,
                    "description" => "OK"
                ),
                "results" => json_decode($json_lapangan) // Konversi JSON ke array untuk data lapangan
            );

            // Mengirim response sebagai JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // Jika tidak ada data lapangan
            $response = array(
                "status" => array(
                    "code" => 404,
                    "description" => "Not Found"
                ),
                "message" => "Tidak ada data lapangan."
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    } else {
        // Jika tidak ada parameter yang dimasukkan
        $response = array(
            "status" => array(
                "code" => 400,
                "description" => "Bad Request"
            ),
            "message" => "Harap masukkan Paramter Yang Sesuai."
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    $conn->close();
}
?>
