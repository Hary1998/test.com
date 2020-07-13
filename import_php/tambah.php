<?php
    include "koneksi.php"
    include "header.php"
    require "functions.php"



// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"])) {
   
    //cek data berhasil ditambah atau tidak
    if ( tambah($_POST)> 0) {
        echo "
            <script> 
                alert('data berhasil ditambahkan!'); 
                document.location.href = 'index.php';
            </script>
        ";
    
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>

    <!-- Load File bootstrap.min.css yang ada difolder css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <title> Form Pendaftaran </title>
    <style>
    .container{
                background: tranparant;
                width: 95%;
                grid-template-columns: 1fr 1fr 1fr 1fr fr;
                grid-template-rows: 30px ;
                grid-gap: 0px;
            }
    </style>
</head>

<div class="container">
<body>
    <h1> <font size=5pt> Form Pendaftaran </h1>
    <form acion="" method="post">
        <ul>
            <li>
                <label for="nis"> <font color="black" > NIS </font> <font color="red">*</font> : </label>
                <input type="text" name="nama" id="nama" placeholder="Name" required> 
            </li>
            <li>
                <label for="nama"> <font color="black" > Nama </font> <font color="red">*</font> : </label>
                <input type="text" name="nama" id="nama" placeholder="Name" required> 
            </li>
            <li>
                <label for="jenis_kelamin"> <font color="black"> Jenis Kelamin </font> <font color="red">*</font> : </label>
                <input type="text" name="jenis_kelamin" id="jenis_kelamin" placeholder="L/P" required>
            </li>
            <li>
                <label for="telp"> <font color="black"> Telepon  </font> <font color="red">*</font> : </label>
                <input type="text" name="telp" id="telp" placeholder="No_tlp" required>
            </li>
            <li>
                <label for="alamat"> <font color="black"> Alamat  </font> <font color="red">*</font> : </label>
                <input type="text" name="alamat" id="alamat" placeholder="Alamat" required>
            </li>
            <li>
                <button type="submit" class="btn btn-info" name="submit"><i class="fa fa-floppy-o"></i> Daftar </button>
            </li>
        </ul>
    
    </form>
</body>
</div>


</html>