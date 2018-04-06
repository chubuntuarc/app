<?php
require("connect.php");
$sql = "SELECT id_recipe, main_pic from recipe WHERE day_recipe = 1";
$result=$mysqli->query($sql);
$rows = $result->num_rows;
while($row = mysqli_fetch_assoc($result)){
    $day_recipe_id = $row["id_recipe"];
    $day_recipe_pic = $row["main_pic"];
} ?>