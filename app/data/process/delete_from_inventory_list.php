<?php
require("../connect.php");
require("../vars.php");
if($_POST['value']){
  $delete_from_shopping_ingredients = "DELETE FROM inventory_list WHERE id_ingredient = " . $_POST['value'] . " AND id_client = " . $id_user ;
  $mysqli->query($delete_from_shopping_ingredients);
}
echo $delete_from_shopping_ingredients;
?>