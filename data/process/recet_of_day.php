<?php
include('/home/cabox/workspace/app/data/vars.php');
include('/home/cabox/workspace/app/data/connect.php');
	
  //Update current day_recipe to 2
  $update_current = "UPDATE recipe SET day_recipe = 2 WHERE day_recipe = 1";
  $update_result = $mysqli->query($update_current);
	//Select values with day_recipe == 0
	$select_empty = "SELECT id_recipe FROM recipe WHERE day_recipe = 0 ORDER BY RAND() LIMIT 1";
  $empty_result = $mysqli->query($select_empty)->fetch_object()->id_recipe;
		if($empty_result == ""){
			//UPDATE NEW day_recipe
			$update_all = "UPDATE recipe SET day_recipe = 0";
  		$all_result = $mysqli->query($update_all);
			$select_empty = "SELECT id_recipe FROM recipe WHERE day_recipe = 0 ORDER BY RAND() LIMIT 1";
  		$empty_result = $mysqli->query($select_empty)->fetch_object()->id_recipe;
			$update_new = "UPDATE recipe SET day_recipe = 1 WHERE id_recipe = " . $empty_result;
  		$new_result = $mysqli->query($update_new);
		}else{
			//UPDATE NEW day_recipe
			$update_new = "UPDATE recipe SET day_recipe = 1 WHERE id_recipe = " . $empty_result;
  		$new_result = $mysqli->query($update_new);
		}
	
?>