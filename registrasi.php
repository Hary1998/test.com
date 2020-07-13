<?php
require 'functions.php';

    if( isset($_POST["register"])) {
        
        if( registrasi($_POST)>0) {
            echo "<script> 
            alert ('user baru berhasil ditambahkan!');
            </script>";
        }else {
            echo mysqli_error($conn);
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>

        <title> Halaman Registrasi </title>
         <link rel="stylesheet" type="text/css" href="style.css">
        <style>
            label {
                display: block;
            }
        </style>

    </head>
    <body>

        <h1 style="font-family:Agency FB;"> Halaman Registrasi </h1>
        <div class="kotak_login" style="font-family:Agency FB;">
            <p class="tulisan_login" style="font-family:Agency FB;"> Login</p>
        <form action="" method="post">
        
        
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" class="form_login" placeholder="Username" required>
            
        
                    <label for="peneng">Peneng :</label>
                    <input type="text" name="peneng" id="peneng" class="form_login" placeholder="Peneng" required>
            
        
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" class="form_login" placeholder="Password" required>
            
            
                    <label for="password2">Konfirmasi password :</label>
                    <input type="password" name="password2" id="password2" class="form_login" placeholder="Konfirmasi" required>
                
                    <button type="submit" name="register" class="tombol_login">Register</button></br>
                
                    <br>
                    <center><a type="submit" name="login" href="login.php" class="tombol_login"> LOGIN HERE!!  </a></br></center>
                
            

        </form>
        </div>
    </body>
</html>