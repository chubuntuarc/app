<?php
require("../app/data/connect.php");
include("../app/data/process/selected_inventory_list.php");
$ingredients = implode(",", $selected_ingredients_array);
if($ingredients == ""){
  $selected_recipes = "SELECT DISTINCT id_recipe FROM recipe_ingredient";
}else{
  $selected_recipes = "SELECT DISTINCT id_recipe FROM recipe_ingredient WHERE ingredient IN (".$ingredients.")";
}
  
  $result_recipes=$mysqli->query($selected_recipes);
  $selected_recipes_array = array();
  while($row = mysqli_fetch_assoc($result_recipes)){
    array_push($selected_recipes_array, $row["id_recipe"]);
  }
?>