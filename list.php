<?php 
require("data/connect.php");
include("data/vars.php");
include("data/shopping_list.php");
error_reporting(0);
if($_POST["list_status"] == 1){
  header('Location: /app/steps.php?id='.$_POST["id_recipe_value"]);  
}else{
  //Save new ingredients on list
  include("data/process/add_to_shopping_list.php");
}
?>
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
      <script type='text/javascript' src='js/start_delete_from_shopping_list.js'></script>
      
      <div class="se-pre-con"></div>
      
      <div navbar-fixed>
        <?php include("element/navbar.php"); ?>
      </div>
      
      <div class="sub-head teal">
        <p>Lista de compras</p>
      </div>
      
      <div class="row">
        <div class="col s12">
      <p class="center-align" style="margin-bottom: 20px;font-weight: bold;">Realiza tus compras más rápido, busca lo que necesitas para cocinar esa receta que tanto te gusta.</p>
          </div>
      </div>
      
      <?php include("element/sidebar.php"); ?>
      
      <div class="row">
        <div class="col s12 m8">
          <div class="card-panel">
          <form action="list.php">
            <?php 
            include('data/shopping_ingredients.php');
            ?>
             <span id="message"></span>
          </form>
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