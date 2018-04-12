<?php
require("../app/data/connect.php");
$steps = "SELECT step, instructions, picture FROM recipe_steps WHERE id_recipe = " . intval($_GET['id']);
$result=$mysqli->query($steps);
$rows = $result->num_rows;

while($row = mysqli_fetch_assoc($result)){
  echo '<div class="row setup-content" id="step-'.$row['step'].'">';
       echo '<div class="col s12">';
            echo '<div class="col m12">';
            echo '<h5> Paso '.$row['step'].'</h5>';
            echo ' <p>'.$row['instructions'].'</p>';
            echo '<img src="'.$row['picture'].'" class="responsive-img z-depth-5" alt="" style="height: 200px;width: 100%;">';          
           if($row['step']!=1){ echo '<button class="btn btn-primary prevBtn btn-lg pull-right" type="button" style="margin-top:10px;margin-right:10px;">Anterior</button>';}
            echo '<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" style="margin-top:10px;">Siguiente</button>';
            echo '</div>';
      echo '</div>';
echo '</div>';
}
?>