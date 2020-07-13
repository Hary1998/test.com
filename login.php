<?php
session_start();

if ( isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';
    
    if ( isset($_POST["login"])) {
        
        $username=$_POST["username"];
        $peneng=$_POST["peneng"];
        $password=$_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user 
                            WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1 ) {


    //cek password
    $row = mysqli_fetch_assoc($result);
    if ( password_verify($password, $row["password"])){
        //set session
        $_SESSION["login"] = true;

        header("Location: index.php");
        exit;
    }

    }
        $error = true;
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title style=> Halaman Login </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="styleB.css">
        <style>
            label {
                display: block;
            }


        </style>
        
    </head>
    <body>
        
        <h1 style="font-family:Agency FB;"> Halaman Login </h1>
         <?php if (isset($error)) : ?>
            <center> <p style="color:red; font-style:italic;"> Username / Password Salah </p> </center>c
        <?php endif; ?>

<div class="kotak_login" style="font-family:Agency FB;">
    <p class="tulisan_login" style="font-family:Agency FB;"> Login</p>

    <form action="" method="post" >

        
            <label for="username">Username :</label>
            <input type"text" name="username" class="form_login" placeholder="Username" id="username" required>
            
            <label for="peneng"> Peneng :</label>
            <input type"text" name="peneng" class="form_login"  placeholder="Peneng" id="peneng" required>
            
            <label for="password">Password :</label>
            <input type="password" name="password" class="form_login" placeholder="Password" id="password" required>
            
            <br> <button type="submit" name="login" class="tombol_login"> Login </button> </br>

            <br><th><b> Register Disini </b></th></br>
            <center> <a class="tombol_register" href="registrasi.php"> Register Now </a>  </center>

    </form>
</div>

    </body>
</html>