<?php 
require("data/connect.php");
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
      <script type='text/javascript' src='js/inventory_list.js'></script>
      
      <div class="se-pre-con"></div>
      
      <div navbar-fixed>
        <?php include("element/navbar.php"); ?>
      </div>
      
      <div class="sub-head teal">
        <p>Inventario</p>
      </div>
      
      <div class="row">
        <div class="col s12">
          <p class="center-align" style="margin-bottom: 20px;font-weight: bold;">Basandonos en tu alacena, buscamos ofrecerte recetas según tus necesidades y no pierdas tiempo buscando ingredientes que no usaras.</p>
        </div>
      </div>
      
      <?php include("element/sidebar.php"); ?>
      
      <div class="row">
        <div class="col s12">
          <div class="row">
            <label>Agregar ingredientes</label>
            <select id="select_ingredients" class="browser-default" onchange="add_to_inventory_list(this)">
              <option value="" disabled selected>Selecciona uno</option>
              <?php
              $sql="SELECT id_ingredient as id, name FROM ingredients ORDER BY name ASC";
              $result=$mysqli->query($sql);
              $rows = $result->num_rows;
              while($row = mysqli_fetch_assoc($result)){
              echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
              }
              ?>
            </select>
          </div>
        </div>
        <div class="col s12 m8">
          <div class="card-panel">
          <form action="inventory.php">
            <?php 
            include('data/inventory_ingredients.php');
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
      
<script type='text/javascript'>
<?php
$php_array = array('abc','def','ghi');
$js_array = json_encode($selected_inventory_array);
echo "var javascript_array = ". $js_array . ";\n";
  echo '$("#select_ingredients").attr("array",javascript_array);';
?>
</script>
      
<script>
  $(".account").sideNav();
  $(".button-collapse").sideNav();
</script>
     
      
  </body>
</html>