<?php
require("connect.php");
$sql = "SELECT counter, sec_pic, name, time, stars, diners FROM recipe WHERE id_recipe = " .  $id_recipe;
$result=$mysqli->query($sql);
$rows = $result->num_rows;
while($row = mysqli_fetch_assoc($result)){
    $counter = $row["counter"];
    $picture = $row["sec_pic"];
    $name = $row["name"];
    $time = $row["time"];
    $stars = $row["stars"];
    $diners = $row["diners"];
} 
?>