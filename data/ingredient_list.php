<?php
require("../app/data/connect.php");
require("../app/data/vars.php");
$selected_ingredients = "SELECT id_ingredient FROM inventory_list WHERE id_client = " . $id_user;
$result_ingredients=$mysqli->query($selected_ingredients);
$selected_ingredients_array = array();
while($row = mysqli_fetch_assoc($result_ingredients)){
  array_push($selected_ingredients_array, $row["id_ingredient"]);
}

require("connect.php");
$sql="SELECT i.id_ingredient as id,i.name as ingredient_name FROM recipe_ingredient r LEFT JOIN ingredients i ON r.ingredient = i.id_ingredient  WHERE id_recipe = " . $id_recipe . "";
$result=$mysqli->query($sql);
$rows = $result->num_rows;

while($row = mysqli_fetch_assoc($result)){
echo '<p>';
if(in_array($row["id"], $selected_ingredients_array)){
echo '<input class="ingredient" type="checkbox" name="ingredients[]" id="ingredient'.$row['id'].'" checked="checked" onClick="count_checks();" value="'.$row['id'].'"/>';
}else {
echo '<input class="ingredient" type="checkbox" name="ingredients[]" id="ingredient'.$row['id'].'" onClick="count_checks();" value="'.$row['id'].'"/>';
}
echo '<label for="ingredient'.$row['id'].'">'.$row['ingredient_name'].'</label>';
echo '</p>';
echo '<input type="hidden" name="ingredient_val[]" value="'.$row['id'].'" />';
}
?>
