<?php 

//Koneksi Database
$conn = mysqli_connect("localhost", "root", "", "db_topik" );


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function add($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $peneng =htmlspecialchars($data["peneng"]);
    $topik =htmlspecialchars($data["topik"]);
    $tgl1 = htmlspecialchars($data["tgl_daftar"]);
    $tgl = htmlspecialchars($data["tgl_akhir"]);

    //query insert data
    $query = "INSERT INTO db_topik
                VALUES
            ('', '$nama', '$peneng', '$topik', '$tgl1', '$tgl')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}






?>