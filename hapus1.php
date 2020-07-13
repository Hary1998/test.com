<?php
// Load file koneksi.php
include "koneksi-2.php";

$id = $_POST['id']; // Ambil data NIS yang dikirim oleh index.php melalui form submit
$query = "DELETE FROM db_topik WHERE id IN(".implode(",", $id).")"; // Buat variabel $query untuk menampung query delete

$sql = $pdo->prepare($query);
$sql->execute(); // Eksekusi/Jalankan query dari variabel $query

header("location: training.php"); // Redirect ke halaman index.php
?>
