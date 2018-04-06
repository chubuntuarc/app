<?php
require("connect.php");
$sql = "SELECT id_recipe, main_pic,sponsor FROM recipe WHERE sponsor = 1";
$result=$mysqli->query($sql);
$rows = $result->num_rows;
while($row = mysqli_fetch_assoc($result)){
    $sponsor_recipe_id = $row["id_recipe"];
    $sponsor_recipe_pic = $row["main_pic"];
    $sponsor_position = $row["sponsor"];
} ?>