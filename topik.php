<?php
    include "tamplate/header.php";
    include "tamplate/connection.php";
    require "functions1.php";


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {
   
    //cek data berhasil ditambah atau tidak
    if ( add($_POST)> 0) {
        echo "
            <script> 
                alert('data berhasil ditambahkan!'); 
                document.location.href = 'training.php';
            </script>
        ";
    
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'training.php';
            </script>
        ";
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Form Pengisian Topik Training </title>
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
    <br>
		<h1>Data Topik</h1>
    </br> 
		<form class="form-horizontal" acion="" method="post" >
			<div class="form-group">
				<label class="control-label col-sm-2" for="nama">Nama Anda:</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control">
				</div>
			</div>
    <br>
            <div class="form-group">
				<label class="control-label col-sm-2" for="peneng">Peneng Anda:</label>
				<div class="col-sm-10">
					<input type="text" name="peneng" class="form-control">
				</div>
			</div>
    </br>
            <div class="form-group">
				<label class="control-label col-sm-2" for="topik">Topik :</label>
				<div class="col-sm-10">
					<input type="text" name="topik" class="form-control">
				</div>
			</div>
    <br>
			<div class="form-group">
				<label class="control-label col-sm-2" for="tgl_daftar">Tanggal Daftar :</label>
				<div class="col-sm-10">
					<input type="date" name="tgl_daftar" class="form-control" id="tgl_daftar">
				</div>
			</div>
    </br>
            <div class="form-group">
				<label class="control-label col-sm-2" for="tgl_akhir">Tanggal Akhir :</label>
				<div class="col-sm-10">
					<input type="date" name="tgl_akhir" class="form-control" id="tgl_akhir">
				</div>
			</div>	
    <br>
			<button type="submit" class="btn btn-info" name="submit"><i class="fa fa-floppy-o">Simpan</button>
		</form>		
	</div>

</body>
</html>