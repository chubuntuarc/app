<?php
require("../connect.php");
require("../vars.php");
if($_POST['value']){
  $insert_into_inventory = "INSERT INTO inventory_list(id_ingredient,id_client) VALUES(" . $_POST['value'] . ", " . $id_user. ")";
  $mysqli->query($insert_into_inventory);
}
echo $insert_into_inventory;
?>