<?php 
//App global vars
include 'data/vars.php'; 

//Required classes
require_once 'data/class/Recipe.php';
require_once 'data/class/User.php';

//If insert element run
if(isset( $_POST['insert'] )) {
     User::addToInventoryList($_POST['value'],$id_user);
}

//If delete element run
if(isset( $_POST['delete'] )) {
     User::deleteFromInventoryList($_POST['value'],$id_user);
}

//Objects
$list = User::getUserInventoryList($id_user);
$ingredients = Recipe::getAllIngredients();

//Html head
include 'element/head.php'; 

//Navbar
include_once 'element/navbar.php';

//Side bar
include_once 'element/sidebar.php';

//Html tags
echo '<div class="sub-head teal">';
  echo '<p>Inventario</p>';
echo '</div>';   

echo '<div class="row">';
  echo '<div class="col s12">';        
    echo '<p class="center-align" style="margin-bottom: 20px;font-weight: bold;">Basandonos en tu alacena, buscamos ofrecerte recetas según tus necesidades y no pierdas tiempo buscando ingredientes que no usaras.</p>';        
  echo '</div>';        
echo '</div>';      

echo '<div class="row">'; 
  echo '<div class="col s12">';        
    echo '<div class="row">';          
    echo '<label>Agregar ingredientes</label>';        
    echo '<select id="select_ingredients" class="browser-default" onchange="add_to_inventory_list(this)">';        
    echo '<option value="" disabled selected>Selecciona uno</option>';          
    //Options script
    foreach($ingredients as $item):
    echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
    endforeach;
    //Options script ends
    echo '</select>';
    echo '</div>';    
  echo '</div>';        
  echo '<div class="col s12 m8">';      
    echo '<div class="card-panel">';        
      echo '<form action="inventory.php">';    
      //Inventory list script
      $selected_inventory_array = array();
      if(!$list){
           echo '<h5>Lista vacia</h5>';
        }else{
          foreach($list as $item):
          echo '<p>';
          echo '<input class="ingredient" type="checkbox" name="ingredient" id="ingredient'.$item['id'].'" value="'.$item['id'].'" checked onClick="delete_from_inventory_list(this)"/>';
          echo '<label for="ingredient'.$item['id'].'">'.$item['ingredient_name'].'</label>';
          echo '</p>';
          array_push($selected_inventory_array, $item["id"]);
          endforeach;
        }
      //Inventory list script ends
      echo '<span id="message"></span>';
      echo '</form>';    
    echo '</div>';    
  echo '</div>';      
    echo '<div class="col s12 m4">';       
      echo '<div class="card">';      
        echo '<div class="card-image">';      
          echo '<img src="http://www.maqui.com.mx/images/clientes/banner_oxxo.jpg">';      
        echo '</div>';    
      echo '</div>';    
    echo '</div>';    
  echo '</div>';

//Js for items delete
echo '<script src="js/inventory_list.js"></script>';

//Js to select ingredients
echo '<script>';
$js_array = json_encode($selected_inventory_array);
echo "var javascript_array = ". $js_array . ";\n";
echo '$("#select_ingredients").attr("array",javascript_array);';
echo '</script>';

//Footer
include 'element/footer.php';

?> 