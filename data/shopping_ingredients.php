<?php
require("connect.php");
$sql="SELECT s.id_ingredient as id, i.name as ingredient_name FROM shopping_ingredients s LEFT JOIN ingredients i ON i.id_ingredient = s.id_ingredient WHERE s.id_list = " . $shopping_list . "";
$result=$mysqli->query($sql);
$rows = $result->num_rows;
if($rows==0) {
// execute for positive results
  echo '<h5>Lista vacia</h5>';
} else {
// execute for 0 rows returned.
  while($row = mysqli_fetch_assoc($result)){
echo '<p>';
echo '<input class="ingredient" type="checkbox" name="ingredient" id="ingredient'.$row['id'].'" list="'.$shopping_list.'" value="'.$row['id'].'" onClick="delete_from_shopping_list(this)"/>';
echo '<label for="ingredient'.$row['id'].'">'.$row['ingredient_name'].'</label>';
echo '</p>';
}
}
?>