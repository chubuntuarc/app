<?php
require("connect.php");
$sql = "SELECT picture FROM sponsors WHERE position = " . $second_sponsor_position;
$result=$mysqli->query($sql);
$rows = $result->num_rows;
while($row = mysqli_fetch_assoc($result)){
    $second_sponsor_logo = $row["picture"];
} ?>