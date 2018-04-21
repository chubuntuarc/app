<?php
//App global vars
include 'data/vars.php'; 

//Required classes
require_once 'data/class/Recipe.php';

//Objects
$id_recipe = $_GET['id'];
$recipe = Recipe::searchById($id_recipe);
$list = Recipe::getRecipeIngredients($id_recipe);
$user_inventory = User::getUserInventory($id_user);

//Update counter
Recipe::updateCounter($id_recipe);

//Html head
include 'element/head.php'; 

//Navbar
include_once 'element/navbar.php';

//Side bar
include_once 'element/sidebar.php';

//Html tags
echo '<div class="row" style="margin-top:64px;">';
  echo '<div class="col s12 m4">';        
    echo ' <div class="card" style="border-radius: 10px;">';
      echo '<div class="card-image" style="border-radius: 10px;">';
        echo '<a href="#!"><img style="border-radius: 10px" class="responsive-img" src="../app/images/recipes/'. $recipe->getMainPic() .'"></a>';
        echo '<span class="card-title today" style="font-size:18px;padding:6px;background-color: #ff6624;border-radius: 0 10px 0 10px;">'. $recipe->getName() .'</span>';
      echo '</div>';
    echo '</div>';
    echo '<div class="col s12">';
      echo '<p class="info col s4 left-align"><i class="tiny material-icons">alarm</i>'. $recipe->getTimes() .'</p>';
      echo '<p class="col s2 right-align"></p>';
      echo '<p class="info col s6 right-align">';
      //Showing stars
      $x = 1;
      $empty = 5 - $recipe->getstars();
      while($x <= $recipe->getstars()) {
        echo '<i class="tiny material-icons">star</i>';
        $x++;
      }
      $y = 1;
      while($y <= $empty) {
        echo '<i class="tiny material-icons">star_border</i>';
        $y++;
      }
        if($recipe->getDiners() <= 2){
          echo '<i class="tiny material-icons">people</i>';
        }
        if($recipe->getDiners() >= 3){
          echo '<i class="tiny material-icons">people</i>';
          echo '<i class="tiny material-icons">people</i>';
        }

     echo '</div>';
   echo '</div>';
 echo '<div class="col s12 m8">';
echo '<div class="card-panel">';
  echo '<span class="info">Ingredientes</span>';
  echo '<form name="ingedient_list" id="ingedient_list" action="list.php" method="post">';
  //Script to get user's inventory list  
   $user_inventory_array = array();
   foreach($user_inventory as $item):
      array_push($user_inventory_array, $item["id_ingredient"]);
   endforeach;
  //Script to show ingredients list  
    foreach($list as $item):
    if(in_array($item["id"], $user_inventory_array)){
    echo '<input class="ingredient" type="checkbox" name="ingredients[]" id="ingredient'.$item['id'].'" checked="checked" onClick="count_checks();" value="'.$item['id'].'"/>';
    }else {
    echo '<input class="ingredient" type="checkbox" name="ingredients[]" id="ingredient'.$item['id'].'" onClick="count_checks();" value="'.$item['id'].'"/>';
    }
    //Check if quantity is on 0, like "To taste" - "Al gusto"
    if($item['quantity'] == 0){
      echo '<label for="ingredient'.$item['id'].'">'.$item['ingredient_name'].'</label>&nbsp;&nbsp;&nbsp;<span>'.$item['type'].' </span>';
    }elseif($item['type_id'] == 5 || $item['type_id'] == 6 || $item['type_id'] == 7 || $item['type_id'] == 8 || $item['type_id'] == 11 || $item['type_id'] == 12){
      echo '<label for="ingredient'.$item['id'].'">'.$item['ingredient_name'].'</label>&nbsp;&nbsp;&nbsp;<span id="quantity_'.$item['id'].'" style="display:none;">'.$item['quantity'].' </span><span>'.$item['type'].' </span>';
    }else{
      echo '<label for="ingredient'.$item['id'].'">'.$item['ingredient_name'].'</label>&nbsp;&nbsp;&nbsp;<span id="quantity_'.$item['id'].'">'.$item['quantity'].' </span><span>'.$item['type'].' </span>';
    }
    
    echo '</p>';
    echo '<input type="hidden" name="ingredient_val[]" value="'.$item['id'].'" />';
    endforeach;
  echo '<input type="hidden" id="list_status" name="list_status" value="0">';
  echo '<input type="hidden" id="id_recipe_value" name="id_recipe_value" value="'.$id_recipe.'">';
  echo '<button id="get_ingredients" class="btn waves-effect waves-light" type="submit" name="action" >Lista de compras</button>';
  echo '</form>';
    echo '</div>';
  echo '</div>';     
echo '</div>';     

//Check if ingredients exist on user inventory
echo '<script src="js/ingredients_validator.js"></script>';

//Footer
include 'element/footer.php';
?>