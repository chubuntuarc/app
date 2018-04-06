<?php
require("../app/data/connect.php");
$sql = "SELECT id_recipe, main_pic FROM recipe ORDER BY counter desc LIMIT 2";
$result=$mysqli->query($sql);
$rows = $result->num_rows;
while($row = mysqli_fetch_assoc($result)){
    $second_popular_id = $row["id_recipe"];
    $second_popular_pic = $row["main_pic"];
} 
?>