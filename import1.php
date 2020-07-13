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
include "koneksi-2.php";

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
  $nama_file_baru = 'data1.xlsx';

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
    $topik = $row['C']; // Ambil data topik
    $tgl = $row['D']; // Ambil data tanggal
    $tgl1 = $row['E']; // Ambil data tanggal


    // Cek jika semua data tidak diisi
    if($nama == "" && $peneng == "" && $topik == "" && $tgl == "" && $tgl1 == "")
      continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

    // Cek $numrow apakah lebih dari 1
    // Artinya karena baris pertama adalah nama-nama kolom
    // Jadi dilewat saja, tidak usah diimport
    if($numrow > 1){
      // Proses simpan ke Database
      // Buat query Insert
      $sql = $pdo->prepare("INSERT INTO db_topik VALUES ('', '$nama', '$peneng', '$topik', '$tgl', '$tgl1')
            ");
      $sql->bindParam(':id');
      $sql->bindParam(':nama', $nama);
      $sql->bindParam(':peneng', $peneng);
      $sql->bindParam(':topik', $topik);
      $sql->bindParam(':tgl_daftar', $tgl_daftar);
      $sql->bindParam(':tgl_akhir', $tgl_akhir);
      $sql->execute(); // Eksekusi query insert
    }

    $numrow++; // Tambah 1 setiap kali looping
  }
}

header('location: training.php'); // Redirect ke halaman awal
?>