<?php 
include("data/vars.php");
$id_recipe = $_GET['id'];
include('data/recipe_data.php');
include('data/counter.php');
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
          $(".se-pre-con").fadeOut("slow");
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
      
      <div class="row" style="margin-top:64px;">
        <div class="col s12 m4">
          <div class="card" style="border-radius: 10px;">
            <div class="card-image" style="border-radius: 10px;">
              <?php echo '<a href="#!"><img style="border-radius: 10px" class="responsive-img" src="../app/images/recipes/'.$picture.'"></a>'; ?>
              <span class="card-title today" style="font-size:18px;padding:6px;background-color: #ff6624;border-radius: 0 10px 0 10px;"><?php echo $name;  ?></span>
            </div>
          </div>
          <div class="col s12">
            <p class="info col s4 left-align"><i class="tiny material-icons">alarm</i><?php echo $time . " min" ?></p>
            <p class="col s2 right-align"></p>
            <p class="info col s6 right-align">
              <?php
                $x = 1;
                $empty = 5 - $stars;
                while($x <= $stars) {
                  echo '<i class="tiny material-icons">star</i>';
                  $x++;
                }
                $x = 1;
                while($x <= $empty) {
                  echo '<i class="tiny material-icons">star_border</i>';
                  $x++;
                }
              if($diners <= 2){
                echo '<i class="tiny material-icons">people</i>';
              }
              if($diners >= 3){
                echo '<i class="tiny material-icons">people</i>';
                echo '<i class="tiny material-icons">people</i>';
              }
              ?>
          </div>
        </div>
        <div class="col s12 m8">
        <div class="card-panel">
          <span class="info">Ingredientes</span>
          <form name="ingedient_list" id="ingedient_list" action="list.php" method="post">
            <?php include('data/ingredient_list.php'); ?>
              <input type="hidden" id="list_status" name="list_status" value="0">
             <button id="get_ingredients" class="btn waves-effect waves-light" type="submit" name="action" >Lista de compras</button>
          </form>
        </div>
      </div>
      </div>
     
      
      <?php include("element/footer.php"); ?>      
      
      <script>
      $(".account").sideNav();
      $(".button-collapse").sideNav();
      </script>
      <script src="js/ingredients_validator.js"></script>
      
    </body>
  </html>