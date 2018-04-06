<?php
require("../connect.php");
if($_POST['value']){
  $delete_from_shopping_ingredients = "DELETE FROM shopping_ingredients WHERE id_ingredient = " . $_POST['value'] . " AND id_list = " . $_POST['list'] ;
  $mysqli->query($delete_from_shopping_ingredients);
}
echo $delete_from_shopping_ingredients;
?>