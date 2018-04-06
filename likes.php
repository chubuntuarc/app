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
      <script type='text/javascript' src='js/edit_likes_list.js'></script>

      <div class="se-pre-con"></div>

      <div navbar-fixed>
        <?php include("element/navbar.php"); ?>
      </div>

      <div class="sub-head teal">
        <p>Mis gustos</p>
      </div>

      <div class="row">
        <div class="col s12 m4 offset-m4">
          <p class="center-align" style="margin-bottom: -20px;font-weight: bold;">Queremos ofrecerte la mejor experiencia, apoyanos seleccionando lo que mas te gusta y nosotros hacemos el resto.</p>
          <span id="message"></span>
        </div>
      </div>

      <?php include("element/sidebar.php"); ?>


      <!--List of selected items by the user-->
      <?php
        include("../app/data/process/selected_liked_list.php");
      ?>


      <link rel="stylesheet" href="../app/css/cards.css">
      <div class="row">
        <?php
          require("../app/data/connect.php");
          $sql = "SELECT id_category ,name,photo FROM categories";
          $result=$mysqli->query($sql);
          $rows = $result->num_rows;
          while($row = mysqli_fetch_assoc($result)){
            echo '<div class="col s4 m2">';
              echo '<div class="card">';
                echo '<div class="card-image">';
             //Check if user has selected this item
            if(in_array($row["id_category"], $selected_likes_array)){
              echo '<p id="'.$row["id_category"].'" user="'.$id_user.'" selected="1" onclick="edit_likes_list(this);" ><img class="responsive-img" src="../app/images/categories/'.$row["photo"].'" style=height:6rem;"></p>';
              echo '<span class="card-title popular red" style="font-size:14px;">'.$row["name"].'</span>';
            }else{
              echo '<p id="'.$row["id_category"].'" user="'.$id_user.'" selected="0" onclick="edit_likes_list(this);" ><img class="responsive-img" src="../app/images/categories/'.$row["photo"].'" style=height:6rem;"></p>';
              echo '<span class="card-title popular" style="font-size:14px;">'.$row["name"].'</span>';
              }
                echo '</div>';
              echo '</div>';
            echo '</div>';
          }
        ?>
      </div>


      <?php include("element/footer.php"); ?>

<script>
  $(".account").sideNav();
  $(".button-collapse").sideNav();
</script>

    </body>
</html>
