<?php
/*
-- Source Code from My Notes Code (www.mynotescode.com)
--
-- Follow Us on Social Media
-- Facebook : http://facebook.com/mynotescode/
-- Twitter  : http://twitter.com/mynotescode
-- Google+  : http://plus.google.com/118319575543333993544
--
-- Terimakasih telah mengunjungi blog kami.
-- Jangan lupa untuk Like dan Share catatan-catatan yang ada di blog kami.
*/

// Load file koneksi.php
include "koneksi.php";

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
  $nama_file_baru = 'data.xlsx';

  // Load librari PHPExcel nya
  require_once 'PHPExcel/PHPExcel.php';

  $excelreader = new PHPExcel_Reader_Excel2007();
  $loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
  $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

  $numrow = 1;
  foreach($sheet as $row){
    // Ambil data pada excel sesuai Kolom
    $nama = $row['A']; // Ambil data nama
    $peneng = $row['B']; // Ambil data peneng
    $departemen = $row['C']; // Ambil data departemen
    $tgl = $row['D']; // Ambil data tanggal

    // Cek jika semua data tidak diisi
    if($nama == "" && $peneng == "" && $departemen == "" && $tgl == "")
      continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

    // Cek $numrow apakah lebih dari 1
    // Artinya karena baris pertama adalah nama-nama kolom
    // Jadi dilewat saja, tidak usah diimport
    if($numrow > 1){
      // Proses simpan ke Database
      // Buat query Insert
      $sql = $pdo->prepare("INSERT INTO tbl_pendaftaran VALUES ('', '$nama', '$peneng', '$departemen', '$tgl')
            ");
      $sql->bindParam(':id');
      $sql->bindParam(':nama', $nama);
      $sql->bindParam(':peneng', $peneng);
      $sql->bindParam(':departemen', $departemen);
      $sql->bindParam(':tgl_daftar', $tgl_daftar);
      $sql->execute(); // Eksekusi query insert
    }

    $numrow++; // Tambah 1 setiap kali looping
  }
}

header('location: index.php'); // Redirect ke halaman awal
?>