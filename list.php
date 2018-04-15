<?php 
//App global vars
include 'data/vars.php'; 

//Required classes
require_once 'data/class/User.php';

//Objects
$shopping_list = User::getUserShoppingList($id_user);

require("data/connect.php");
include("data/shopping_list.php");
error_reporting(0);
if($_POST["list_status"] == 1){
  header('Location: /app/steps.php?id='.$_POST["id_recipe_value"]);  
}else{
  //Save new ingredients on list
  include("data/process/add_to_shopping_list.php");
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
      include_once('data/shopping_ingredients.php');
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

//Footer
include 'element/footer.php';
?>