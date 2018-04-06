<?php
require("connect.php");
$sql = "UPDATE recipe SET counter = counter + 1 WHERE id_recipe = " . $id_recipe;
$result=$mysqli->query($sql); 
?>