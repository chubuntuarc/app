<?php
require("../connect.php");
if($_POST['selected'] == 1){
  $update_likes_list = "DELETE FROM likes_list WHERE id_category = ".$_POST['value']." AND id_client = ".$_POST['user'];
}else{
   $update_likes_list = "INSERT INTO likes_list(id_category, id_client) VALUES (".$_POST['value'].", ".$_POST['user'].")";
}
$mysqli->query($update_likes_list);
echo $update_likes_list;
?>