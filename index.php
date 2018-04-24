<?php 
//App global vars
include 'data/vars.php'; 

//Required classes
require_once 'data/class/Category.php';
require_once 'data/class/Recipe.php';
require_once 'data/class/Site.php';
require_once 'data/class/Sponsor.php';
require_once 'data/class/User.php';

//Visits counter
Site::putVisit();

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
include 'element/categories_cards.php';

//Footer
include 'element/footer.php';
?>          