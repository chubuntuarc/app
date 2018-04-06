<?php
require("connect.php");
$sql = "SELECT id_list from shopping_list WHERE id_client = " . $id_user;
$result=$mysqli->query($sql);
$rows = $result->num_rows;
while($row = mysqli_fetch_assoc($result)){
    $shopping_list = $row["id_list"];
} ?>
