<?php
header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

$result = array();

if ($method == 'GET') {
    $result['status'] = [
        "code" => 200,
        "description" => 'Request Valid'
    ];

    $servername = "localhost";
    $username = "root";
    $password = "12345";
    $dbname = "deb_demografi";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Periksa apakah parameter id_prov telah diberikan dalam permintaan GET
    if (isset($_GET['id_prov'])) {
        $id_prov = $_GET['id_prov'];

        // Lakukan sanitasi pada nilai id_prov untuk mencegah SQL Injection
        $id_prov = mysqli_real_escape_string($conn, $id_prov);

        // Query SQL untuk mengambil data kabupaten berdasarkan id_prov
        $sql = "SELECT * FROM kabupaten WHERE id_prov = $id_prov";

        $hasil_query = $conn->query($sql);

        if ($hasil_query->num_rows > 0) {
            $result['hasil'] = $hasil_query->fetch_all(MYSQLI_ASSOC);
        } else {
            $result['hasil'] = [];
        }
    } else {
        // Jika parameter id_prov tidak diberikan, berikan pesan kesalahan
        $result['status'] = [
            "code" => 400,
            "description" => 'Invalid Request. Missing id_prov parameter.'
        ];
    }

    $conn->close();
} else {
    $result['status'] = [
        "code" => 400,
        "description" => 'Request Not Valid'
    ];
}

echo json_encode($result);
?>
