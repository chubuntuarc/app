<?php 
//App global vars
include 'data/vars.php'; 

//Required classes
require_once 'data/class/User.php';

//Objects
$list = User::getUserShoppingList($id_user);

//Check list status
error_reporting(0);
if($_POST["list_status"] == 1){
  header('Location: /app/steps.php?id='.$_POST["id_recipe_value"]);  
}else{
  //Save new ingredients on list
  User::addToShoppingList($_POST['ingredient_val'],$_POST['ingredients'],$id_user);
}

//Html head
include 'element/head.php'; 

//Navbar
include_once 'element/navbar.php';

//Side bar
include_once 'element/sidebar.php';

//Html tags
echo '<div class="sub-head teal">';
  echo '<p>Lista de compras</p>';
echo '</div>';

echo '<div class="row">';
  echo '<div class="col s12">';
    echo '<p class="center-align" style="margin-bottom: 20px;font-weight: bold;">Realiza tus compras más rápido, busca lo que necesitas para cocinar esa receta que tanto te gusta.</p>';
  echo '</div>';
echo '</div>';

echo '<div class="row">';
  echo '<div class="col s12 m8">';
    echo '<div class="card-panel">';
    echo '<form action="list.php">';
      //Script to print ingredients
        if(!$list){
           echo '<h5>Lista vacia</h5>';
        }else{
          foreach($list as $item):
          echo '<p>';
          echo '<input class="ingredient" type="checkbox" name="ingredient" id="ingredient'.$item['id'].'" list="'.$id_user.'" value="'.$item['id'].'" onClick="delete_from_shopping_list(this)"/>';
          echo '<label for="ingredient'.$item['id'].'">'.$item['ingredient_name'].'</label>';
          echo '</p>';
          endforeach;
        }
      echo '<span id="message"></span>';
    echo '</form>';
    echo '</div>';
  echo '</div>';  
echo '<div class="col s12 m4">';
  echo '<div class="card">';
    echo '<div class="card-image">';
      echo '<img src="http://www.maqui.com.mx/images/clientes/banner_oxxo.jpg">';
      echo'</div>';
    echo '</div>';
  echo '</div>';
echo '</div>';

//Js for items delete
echo '<script src="js/start_delete_from_shopping_list.js"></script>';

//Footer
include 'element/footer.php';
?>