<?php
require("connect.php");
$sql = "SELECT id_recipe, main_pic,sponsor FROM recipe WHERE sponsor = 2";
$result=$mysqli->query($sql);
$rows = $result->num_rows;
while($row = mysqli_fetch_assoc($result)){
    $second_sponsor_recipe_id = $row["id_recipe"];
    $second_sponsor_recipe_pic = $row["main_pic"];
    $second_sponsor_position = $row["sponsor"];
} ?>