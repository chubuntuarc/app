<?php 
include("data/vars.php");
?>
<!DOCTYPE html>
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <title><?php echo "Cook your way - ".$app_name; ?></title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <link rel="stylesheet" href="../app/css/style.css">
      <link rel="stylesheet" href="../app/css/steps.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="shortcut icon" type="image/png" href="../favicon.png"/>
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
      
      <div class="sub-head teal">
        <p>Pasos para cocinar</p>
      </div>
      
      <?php include("element/sidebar.php"); ?>
      
      <div class="row">
        <div class="col s12">
          <div class="container">
          <div class="stepwizard col s12">
              <div class="stepwizard-row setup-panel">
                <?php include('../app/data/steps_list_bar.php'); ?>
              </div>
          </div>
          <form role="form">
              <?php include('../app/data/steps_list.php'); ?>
          </form>
          </div>
        </div>
      </div>
     
      <?php include("element/footer.php"); ?>      
      
      <script>
      $(".account").sideNav();
        $(".button-collapse").sideNav();
      </script>
      
      <script type='text/javascript' src='../app/js/steps.js'></script>
      
    </body>
  </html>