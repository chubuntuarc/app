<?php 
//App global vars
include 'data/vars.php'; 

//Required classes
require_once 'data/class/Category.php';
require_once 'data/class/Recipe.php';
require_once 'data/class/Sponsor.php';
require_once 'data/class/User.php';

//Html head
include 'element/head.php'; 

//CSS
echo '<link rel="stylesheet" href="css/cards.css">';

//Navbar
include_once 'element/navbar.php';

//Side bar
include_once 'element/sidebar.php';

//Main cards
include_once 'element/main_cards.php';

//Recomended cards
include 'element/recomended_cards.php';

//Popular cards
include 'element/popular_cards.php';

//Categories cards
echo '<div class="recomended-title" style="background-color: '.$second_color.';color:#FFF;">';
echo '<h2 class="container">Categorías</h2>';
echo '</div>';
echo '<div class="container" style="margin-top:20px;">';
include 'element/categories_cards.php'; //Categories cards script
echo '</div>';

//Footer
include 'element/footer.php';
?>          