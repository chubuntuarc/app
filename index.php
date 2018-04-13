<?php 
//App global vars
include 'data/vars.php'; 
//Html head
include 'element/head.php'; 
//Navbar
echo '<div navbar-fixed>';
include_once 'element/navbar.php';
echo '</div>';
//Side bar
include_once 'element/sidebar.php';
//Main cards
echo '<div class="container cards">';
include_once 'element/main_cards.php'; //Main cards script
echo '</div>';
//Recomended cards
echo '<div class="recomended-title" style="background-color: '.$main_color.';color:#FFF;">';
echo '<h2 class="container">Recomendados</h2>';
echo '</div>';
echo '<div class="container" >';
include 'element/recomended_cards.php'; //Recomended cards script
echo '</div>';
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