<?php

//fungsi Session....................................................

session_start();

if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

//include/require...................................................
    include "tamplate/header.php";
    include "tamplate/connection.php";
    require "functions.php";

//ambil data di URL
$id = $_GET["id"];

//query data berdasarkan id 
$mhs = query("SELECT * FROM tbl_pendaftaran WHERE id = $id")[0]; 

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {
   
    //cek data berhasil diubah atau tidak
    if ( ubah($_POST)> 0) {
        echo "
            <script> 
                alert('data berhasil diubah!'); 
                document.location.href = 'index.php';
            </script>
        ";
    
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Ubah Data </title>
</head>

<body>
    
    <h1> <font size=5pt> Ubah Data </h1>

    <form acion="" method="post">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <ul>
            <li>
                <label for="nama"> <font color="black" > Nama </font> <font color="red">*</font> : </label>
                <input type="text" name="nama" id="nama" placeholder="Name" required value="<?= $mhs["nama"]; ?>"> 
            </li>
            <li>
                <label for="peneng"> <font color="black"> Peneng </font> <font color="red">*</font> : </label>
                <input type="text" name="peneng" id="peneng" placeholder="Peneng" value="<?= $mhs["peneng"]; ?>">
            </li>
            <li>
                <label for="departemen"> <font color="black"> Departemen  </font> <font color="red">*</font> : </label>
                <input type="text" name="departemen" id="departemen" placeholder="Departemen" value="<?= $mhs["departemen"]; ?>">
            </li>
            <li>
                <label for="tgl_daftar"> <font color="black"> Tanggal  </font> <font color="red">*</font> : </label>
                <input type="date" name="tgl_daftar" id="tgl_daftar" value="<?= $mhs["tgl_daftar"]; ?>">
            </li>
            <li>
                <button type="submit" class="btn btn-info" name="submit"><i class="fa fa-floppy-o"></i> Ubah </button>
            </li>
        </ul>
    
    </form>
</body>



</html>