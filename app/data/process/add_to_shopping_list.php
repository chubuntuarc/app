<?php
if($_POST['ingredients']){
    if (isset($_POST['ingredient_val'])) { //to run PHP script on submit
        $options = $_POST['ingredient_val'];
        $checked = $_POST['ingredients'];
        $unchecked = array_diff($options, $checked);
        $insert_ingredients = "INSERT INTO shopping_ingredients (id_ingredient, id_list) VALUES ";
        foreach($unchecked as $result) {
          $insert_ingredients .= "(".$result.", ".$shopping_list."),";
          }
           $insert_ingredients = substr_replace($insert_ingredients, "", -1);
     }
          $mysqli->query($insert_ingredients);
  header('Location: /app/list.php');  
    }else{
      $insert_ingredients = "";
    }
?>