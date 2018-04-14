<?php 
//App global vars
include 'data/vars.php'; 

//Required classes
require_once 'data/class/Recipe.php';
require_once 'data/class/Sponsor.php';
require_once 'data/class/User.php';

//Html head
include 'element/head.php'; 

//Navbar
include_once 'element/navbar.php';

//Side bar
include_once 'element/sidebar.php';

//Main cards
include_once 'element/main_cards.php';

//Recomended cards
include 'element/recomended_cards.php';

//Popular cards
echo '<div class="recomended-title" style="background-color: '.$fourth_color.';color:#FFF;">';
echo '<h2 class="container">Populares</h2>';
echo '</div>';
echo '<div class="container hide-on-small-only" style="margin-top:20px;">';
echo '<p style="margin-bottom: -20px;font-weight: bold;">Estos son los platillos que todos quieren.</p>';
include 'element/popular_cards.php'; //Popular cards script
echo '</div>';

//Popular mobile cards
echo '<div class="container hide-on-med-and-up">';
echo '<p style="margin-bottom: -20px;font-weight: bold;">Estos son los platillos que todos quieren.</p>';
include 'element/popular_mobile_cards.php'; //Popular mobile cards script
echo '</div>';

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