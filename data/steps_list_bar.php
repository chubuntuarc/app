<?php
require("../app/data/connect.php");
$steps = "SELECT step FROM recipe_steps WHERE id_recipe = " . intval($_GET['id']);
$result=$mysqli->query($steps);
$rows = $result->num_rows;

while($row = mysqli_fetch_assoc($result)){
  if($row['step'] == 1){
     echo '<div class="stepwizard-step">';
     echo '<a href="#step-'.$row['step'].'" type="button" class="btn btn-primary btn-circle">'.$row['step'].'</a>';
  echo '</div>';
  }else{
     echo '<div class="stepwizard-step">';
     echo '<a href="#step-'.$row['step'].'" type="button" class="btn btn-default btn-circle" disabled="disabled">'.$row['step'].'</a>';
  echo '</div>';
  }
 
}
?>