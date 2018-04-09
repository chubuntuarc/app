<?php
require("../app/data/connect.php");
$steps = "SELECT step, instructions, picture FROM recipe_steps WHERE id_recipe = " . intval($_GET['id']);
$result=$mysqli->query($steps);
$rows = $result->num_rows;

while($row = mysqli_fetch_assoc($result)){
 echo '<div class="card-panel">';
   echo '<h5>Paso '.$row['step'].'</h5>';
   echo '<p>'.$row['instructions'].'</p>';            
   echo '<img src="'.$row['picture'].'" class="responsive-img z-depth-5" alt="" style="height: 200px;width: 100%;">';
echo '</div>';
}
?>