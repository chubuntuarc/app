<?php
//App global vars
include 'data/vars.php'; 

//Required classes
require_once 'data/class/Category.php';
require_once 'data/class/User.php';

//Objects
$likes = User::getUserLikedCategories($id_user);
$categories = Category::getAllCategories();

//Html head
include 'element/head.php'; 

//CSS
echo '<link rel="stylesheet" href="css/cards.css">';

//Navbar
include_once 'element/navbar.php';

//Side bar
include_once 'element/sidebar.php';

//Html tags
echo '<div class="sub-head teal">';
  echo '<p>Mis gustos</p>';
echo '</div>';

echo '<div class="row">';
  echo '<div class="col s12 m4 offset-m4">';
    echo '<p class="center-align" style="margin-bottom: -20px;font-weight: bold;">Queremos ofrecerte la mejor experiencia, apoyanos seleccionando lo que mas te gusta y nosotros hacemos el resto.</p>';
    echo '<span id="message"></span>';
  echo '</div>';
echo '</div>';

echo '<div class="row">';
//Likes list script
$selected_likes_array = array();
foreach($likes as $item):
array_push($selected_likes_array, $item["id_category"]);
endforeach;
foreach($categories as $item):
  echo '<div class="col s4 m2">';
    echo '<div class="card" style="cursor: pointer;">';
      echo '<div class="card-image">';
   //Check if user has selected this item
  if(in_array($item["id_category"], $selected_likes_array)){
    echo '<p id="'.$item["id_category"].'" user="'.$id_user.'" selected="1" onclick="edit_likes_list(this);" ><img class="responsive-img" src="../app/images/categories/'.$item["photo"].'" style=height:6rem;"></p>';
    echo '<span class="card-title popular red" style="font-size:14px;">'.$item["name"].'</span>';
  }else{
    echo '<p id="'.$item["id_category"].'" user="'.$id_user.'" selected="0" onclick="edit_likes_list(this);" ><img class="responsive-img" src="../app/images/categories/'.$item["photo"].'" style=height:6rem;"></p>';
    echo '<span class="card-title popular" style="font-size:14px;">'.$item["name"].'</span>';
    }
      echo '</div>';
    echo '</div>';
  echo '</div>';
endforeach;

echo '</div>';

//Js for edit likes list
echo '<script src="js/edit_likes_list.js"></script>';

//Footer
include 'element/footer.php';
?>