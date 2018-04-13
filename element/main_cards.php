<?php
//Required classes
require_once 'data/class/Recipe.php';
require_once 'data/class/Sponsor.php';
//Objects
$day_recipe = Recipe::daysRecipe();
$first_sponsor_recipe = Recipe::getFirstSponsor();
$first_sponsor_logo = Sponsor::getFirstSponsorLogo();
$second_sponsor_recipe = Recipe::getSecondSponsor();
$second_sponsor_logo = Sponsor::getSecondSponsorLogo();
//Html tags
echo '<link rel="stylesheet" href="../app/css/cards.css">';
echo '<div class="row">';
//Day's recipe
if($day_recipe){
  echo '<div class="col s12 m8">';
    echo '<div class="card">';
      echo '<div class="card-image">';
        echo '<a class="hide-on-small-only" href="recipe.php?id='.$day_recipe->getId().'"><img src="../app/images/recipes/'.$day_recipe->getMainPic().'" style="height:425px;"></a>';
        echo '<a class="hide-on-med-and-up" href="recipe.php?id='.$day_recipe->getId().'"><img src="../app/images/recipes/'.$day_recipe->getMainPic().'" style="height:250px;"></a>';
        echo '<span class="card-title today" style="background-color: #ff6624;border-radius: 0 10px 0 10px;">Receta del día</span>';
      echo '</div>';
    echo '</div>';
  echo '</div>';
 }else{
    echo 'No se encontro la receta del día';
 }
//First sponsor recipe
if($first_sponsor_recipe){
echo '<div class="col s12 m4">';
  echo '<div class="card">';
    echo '<div class="card-image">';
      echo '<a class="hide-on-small-only" href="recipe.php?id='.$first_sponsor_recipe->getId().'"><img src="../app/images/recipes/'.$first_sponsor_recipe->getMainPic().'" style="height:200px;"></a>';
      echo '<a class="hide-on-med-and-up" href="recipe.php?id='.$first_sponsor_recipe->getId().'"><img src="../app/images/recipes/'.$first_sponsor_recipe->getMainPic().'" style="height:250px;"></a>';
      if($first_sponsor_logo){ echo '<img src="../app/images/sponsors/'.$first_sponsor_logo->getPicture().'" style="position: absolute; width: 50px;left: 10px;top:10px;">'; }
      echo '<span class="card-title sponssor">Patrocinado</span>';
    echo '</div>';
  echo '</div>';
echo '</div>';
 }else{
    echo 'No se encontro la primera receta patrocinada';
 }
//Second sponsor recipe
if($second_sponsor_recipe){
echo '<div class="col s12 m4">';
  echo '<div class="card">';
    echo '<div class="card-image">';
      echo '<a class="hide-on-small-only" href="recipe.php?id='.$second_sponsor_recipe->getId().'"><img src="../app/images/recipes/'.$second_sponsor_recipe->getMainPic().'" style="height:200px;"></a>';
      echo '<a class="hide-on-med-and-up" href="recipe.php?id='.$second_sponsor_recipe->getId().'"><img src="../app/images/recipes/'.$second_sponsor_recipe->getMainPic().'" style="height:250px;"></a>';
      if($second_sponsor_logo){ echo '<img src="../app/images/sponsors/'.$second_sponsor_logo->getPicture().'" style="position: absolute; width: 50px;left: 10px;top:10px;">'; }
      echo '<span class="card-title sponssor">Patrocinado</span>';
    echo '</div>';
  echo '</div>';
echo '</div>';
 }else{
    echo 'No se encontro la primera receta patrocinada';
 }
echo '</div>';
  ?>
      