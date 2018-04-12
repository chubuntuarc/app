<?php include("data/vars.php"); ?>
<!DOCTYPE html>
  <html>
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title><?php echo "Cook your way - ".$app_name; ?></title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
      
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <link rel="stylesheet" href="../app/css/style.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="shortcut icon" type="image/png" href="../favicon.png"/>
      <link href="../favicon.png" rel="apple-touch-icon" />
      <link href="../favicon.png" rel="apple-touch-icon" sizes="152x152" />
      <link href="../favicon.png" rel="apple-touch-icon" sizes="167x167" />
      <link href="../favicon.png" rel="apple-touch-icon" sizes="180x180" />
      <link href="../favicon.png" rel="icon" sizes="192x192" />
      <link href="../favicon.png" rel="icon" sizes="128x128" />
    </head>

    <body>
      <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>
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
      
       <?php include("element/sidebar.php"); ?> 
            
      <div class="container cards hide-on-small-only">
        <?php include("element/main_cards.php"); ?>
      </div>
      <div class="container cards hide-on-med-and-up">
        <?php include("element/main_mobile_cards.php"); ?>
      </div>
      
      <div class="recomended-title" <?php echo 'style="background-color: '.$main_color.';color:#FFF;"' ?>>
        <h2 class="container">Recomendados</h2>
      </div>
      
      <div class="container" >
        <?php include("element/recomended_cards.php"); ?>
      </div>
      
      <div class="recomended-title" <?php echo 'style="background-color: '.$fourth_color.';color:#FFF;"' ?>>
        <h2 class="container">Populares</h2>
      </div>
      
      <div class="container hide-on-small-only" style="margin-top:20px;">
        <p style="margin-bottom: -20px;font-weight: bold;">Estos son los platillos que todos quieren.</p>
        <?php include("element/popular_cards.php"); ?>
      </div>
      <div class="container hide-on-med-and-up">
        <p style="margin-bottom: -20px;font-weight: bold;">Estos son los platillos que todos quieren.</p>
        <?php include("element/popular_mobile_cards.php"); ?>
      </div>
      
      <div class="recomended-title" <?php echo 'style="background-color: '.$second_color.';color:#FFF;"' ?>>
        <h2 class="container">Categorías</h2>
      </div>
      
      <div class="container" style="margin-top:20px;">
        <?php include("element/categories_cards.php"); ?>
      </div>
      
      <?php include("element/footer.php"); ?>      
      
      <script>
      $(".account").sideNav();
        $(".button-collapse").sideNav();
      </script>
      
    </body>
  </html>