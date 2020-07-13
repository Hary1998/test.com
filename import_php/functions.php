<?php 

//Koneksi Database
$conn = mysqli_connect("localhost", "root", "", "mynotescode" );


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    global $conn;

    $nis = htmlspecialchars($data["nis"]);
    $nama = htmlspecialchars($data["nama"]);
    $jenis =htmlspecialchars($data["jenis_kelamin"]);
    $tlp =htmlspecialchars($data["telp"]);
    $alamat = htmlspecialchars($data["alamat"]);

    //query insert data
    $query = "INSERT INTO siswa
                VALUES
            ('', '$nis', '$nama', '$jenis', '$tlp', '$alamat')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_pendaftaran WHERE id = $id");
    return mysqli_affected_rows($conn);
}



function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $peneng =htmlspecialchars($data["peneng"]);
    $departemen =htmlspecialchars($data["departemen"]);
    $tgl_daftar = htmlspecialchars($data["tgl_daftar"]);

    //query insert data
    $query = "UPDATE tbl_pendaftaran SET
            nama = '$nama',
            peneng = '$peneng',
            departemen = '$departemen',
            tgl_daftar = '$tgl_daftar'
            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);        

}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $peneng = strtolower(stripslashes($data["peneng"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    
    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE
    username = '$username'");
    if (mysqli_fetch_assoc($result)){
        echo "<script>
                alert('username sudah terdaftar!')
             </script>"; 
        return false;
    }

    //cek konfirmasi password
    if( $password !== $password2) {
        echo "<script>
            alert('konfirmasi password tidak sesuai');
        </script>";
        return false;
    }
    

//enkripsi password
$password = password_hash($password, PASSWORD_DEFAULT );
//tambah userbaru ke database
mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$peneng', '$password')");
return mysqli_affected_rows($conn);

}




?>