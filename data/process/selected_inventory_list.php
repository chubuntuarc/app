<?php
  require("../app/data/connect.php");
  $selected_ingredients = "SELECT id_ingredient FROM inventory_list";
  $result_ingredients=$mysqli->query($selected_ingredients);
  $selected_ingredients_array = array();
  while($row = mysqli_fetch_assoc($result_ingredients)){
    array_push($selected_ingredients_array, $row["id_ingredient"]);
  }
?>