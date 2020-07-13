<?php

//connection account to db mysqli
$hostname = "localhost";
$user = "root";
$password = "";
$db_names = "phptest";

$conn=mysqli_connect($hostname, $user, $password, $db_names);
//check connection
if (mysqli_connect_errno()){
    echo "koneksi database gagal : " ,mysqli_connect_error();
}
?>

<?php

//connection account to db mysqli
$hostname = "localhost";
$user = "root";
$password = "";
$db_names = "db_topik";

$conn=mysqli_connect($hostname, $user, $password, $db_names);
//check connection
if (mysqli_connect_errno()){
    echo "koneksi database gagal : " ,mysqli_connect_error();
}
?>

