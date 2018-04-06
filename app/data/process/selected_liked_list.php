<?php
  require("../app/data/connect.php");
  $selected_likes = "SELECT id_category FROM likes_list";
  $result_selected=$mysqli->query($selected_likes);
  $selected_likes_array = array();
  while($row = mysqli_fetch_assoc($result_selected)){
    array_push($selected_likes_array, $row["id_category"]);
  }
?>