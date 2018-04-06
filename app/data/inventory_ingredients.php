<?php
require("connect.php");
$sql="SELECT s.id_ingredient as id, i.name as ingredient_name FROM inventory_list s LEFT JOIN ingredients i ON i.id_ingredient = s.id_ingredient WHERE s.id_client = " . $id_user . " ORDER BY name ASC";
$result=$mysqli->query($sql);
$rows = $result->num_rows;
$selected_inventory_array = array();
if($rows==0) {
// execute for positive results
  echo '<h5>Lista vacia</h5>';
} else {
// execute for 0 rows returned.
  while($row = mysqli_fetch_assoc($result)){
echo '<p>';
echo '<input class="ingredient" type="checkbox" name="ingredient" id="ingredient'.$row['id'].'" value="'.$row['id'].'" checked onClick="delete_from_inventory_list(this)"/>';
echo '<label for="ingredient'.$row['id'].'">'.$row['ingredient_name'].'</label>';
echo '</p>';
    array_push($selected_inventory_array, $row["id"]);
}
}
?>