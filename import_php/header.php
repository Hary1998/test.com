
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=0.6">
    </head>

<body>

   <!---navbar-->
      <nav>
        <div class="nav-wrapper"> 
          <a href="./" class="brand-logo">Logo</a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="tambah.php"> Daftar </a></li>
          <li><a href="index.php"> Lihat </a></li>
          <li><a href="topik.php"> Topik </a></li>
            <li><a href="training.php"> Skedul </a></li>
        </ul>
      </div>
    </nav>

    	<ul class="sidenav" id="mobile-demo">
         <li><a href="tambah.php"> Daftar </a></li>
            <li><a href="index.php"> Lihat  </a></li>
            <li><a href="topik.php"> Topik </a></li>
            <li><a href="training.php"> Skedul </a></li>
    	</ul>
  <!---navbar.end-->

  <!--JavaScript at end of body for optimized loading-->
      <script src="assets/js/jquery-2.1.1.min.js"> </script>
      <script type="text/javascript" src="assets/js/materialize.min.js"></script>
    
    <script type="text/javascript" >
    $(document).ready(function(){
      $('.sidenav').sidenav();
       $('.slider').slider();
       $('select').formSelect();
      });
      </script>
    
    </body>
  </html>