<?php
require("../app/data/connect.php");
$sql = "SELECT id_recipe, main_pic FROM recipe ORDER BY counter desc LIMIT 3";
$result=$mysqli->query($sql);
$rows = $result->num_rows;
while($row = mysqli_fetch_assoc($result)){
    $third_popular_id = $row["id_recipe"];
    $third_popular_pic = $row["main_pic"];
} 
?>