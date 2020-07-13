<?php
include "koneksi.php";
include "tamplate/header.php";
require 'functions.php';

session_start();

if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Load File jquery.min.js yang ada difolder js -->
    <script src="js/jquery.min.js"></script>

            <title> Hasil Pendaftaran </title>       
    <link rel="stylesheet" type="text/css" href="styleB.css">
    
    <!-- Load File bootstrap.min.css yang ada difolder css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

<!--Script Save as, Table, Search...-->

            <script src="jquery.dataTables.min.js"></script>
            <link rel="stylesheet" href=jquery.dataTables.min.css>
            <link rel="stylesheet" href="assets/css/buttons.dataTables.min.css">
            <script src="assets/js/dataTables.buttons.min.js"></script>
            <script src="assets/js/buttons.flash.min.js"></script>
            <script src="assets/js/jszip.min.js"></script>
            <script src="assets/js/pdfmake.min.js"></script>
            <script src="assets/js/vfs_fonts.js"></script>
            <script src="assets/js/buttons.html5.min.js"></script>
            <script src="assets/js/buttons.print.min.js"></script>
            <style>
            .container{
                background: ;
                grid-template-rows: 30px ;
                grid-gap: 0px;
            }
            
            </style>
    </head>
    
    <tbody>
    <div class="container">
    <div id="button">
        <br><a href="form.php" class="btn btn-info btn-xs"><i clas="glyphicon glyphicon-import"></i> Import Data </a> </br>
    </div>
    <br>
    <div class="table-responsive">
        <form method="post" action="hapus.php" id="form-delete">
        <table id="data" border="1" cellpadding="10" cellspacing="0" class="table table-bordered">
<thead>
          <tr> 
            <th><input type="checkbox" id="check-all"></th>
            <th>No.</th>
            <th>Nama</th>
            <th>Peneng</th>
            <th>departemen</th>
            <th>Tgl Daftar</th>
          </tr>
</thead>
    <?php
    
             // Buat query untuk menampilkan semua data siswa
                $sql = $pdo->prepare("SELECT * FROM tbl_pendaftaran ORDER BY id DESC");
                $sql->execute(); // Eksekusi querynya

                $no = 1; // Untuk penomoran tabel, di awal set dengan 1
          while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
            echo "<tr>";
            echo "<td><input type='checkbox' class='check-item' name='id[]' value='".$data['id']."'></td>";
            echo "<td>".$no."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['peneng']."</td>";
            echo "<td>".$data['departemen']."</td>";
            echo "<td>".$data['tgl_daftar']."</td>";
            echo "</tr>";
            
            $no++; // Tambah 1 setiap kali looping
          }
            
     ?>   
    </table> 
    <button type="button" id="btn-delete">DELETE</button>
    </form>
</tbody>
</div>
</br>
    
       <script>
      $(document).ready(function() {
        $('#data').DataTable ( {
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
        } );

      } );


       $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    $("#check-all").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
      else // Jika checkbox all tidak diceklis
        $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
    });
    
    $("#btn-delete").click(function(){ // Ketika user mengklik tombol delete
      var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi
      
      if(confirm) // Jika user mengklik tombol "Ok"
        $("#form-delete").submit(); // Submit form
    });
  });

      </script>

</html>