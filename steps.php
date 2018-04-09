<?php 
include("data/vars.php");
?>
<!DOCTYPE html>
  <html>
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <title><?php echo "Cook your way - ".$app_name; ?></title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <link rel="stylesheet" href="../app/css/style.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="shortcut icon" type="image/png" href="../favicon.png"/>
    </head>

    <body>
      <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>
      <script>
      //paste this code under the head tag or in a separate js file.
        // Wait for window load
        $(window).load(function() {
          // Animate loader off screen
          $(".se-pre-con").fadeOut("slow");;
        });
      </script>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      
      <div class="se-pre-con"></div>
      
      <div navbar-fixed>
        <?php include("element/navbar.php"); ?>
      </div>
      
      <div class="sub-head teal">
        <p>Pasos para cocinar</p>
      </div>
      
      <?php include("element/sidebar.php"); ?>
      
      <!--La info se va a actualizar en base al siguiente o anterior paso, descargar todos los pasos en arreglo, o inputs escondidos y mostrar
      y/o ocultar segun el paso ue siga con javascript-->
      <div class="row">
      <div id="step1" class="col s12 m8">
       <div class="row">
          <div class="card-panel">
            <h5>Paso 1</h5>
            <p>
              Para la salsa, pon los tomates en una cacerola pequeña; añade suficiente agua para cubrir arriba de una pulgada.
            </p>
            <img src="https://i.ytimg.com/vi/jfAh3fOBB6E/maxresdefault.jpg" class="responsive-img z-depth-2" alt="">
        </div>
      </div> 
       </div>
          <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="http://www.maqui.com.mx/images/clientes/banner_oxxo.jpg">
            </div>
          </div>
        </div>
      </div>
      
      
      
     
      <?php include("element/footer.php"); ?>      
      
      <script>
      $(".account").sideNav();
        $(".button-collapse").sideNav();
      </script>
      
    </body>
  </html>