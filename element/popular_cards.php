<?php
//Objects
$recipes = Recipe::getPopularRecipes();
//Html tags
echo '<div class="recomended-title" style="background-color: '.$fourth_color.';color:#FFF;">';
echo '<h2 class="container">Populares</h2>';
echo '</div>';
echo '<div class="container">';
echo '<p style="margin-bottom: -20px;font-weight: bold;">Estos son los platillos que todos quieren.</p>';
echo '<div class="row">';
//Script
$i = 0;
foreach($recipes as $item):
$i++;
if($i==1){
  echo '<div class="col s12 m6">';
    echo '<div class="card">';
      echo '<div class="card-image">';
        echo '<a class="container hide-on-small-only" href="recipe.php?id='.$item['id_recipe'].'"><img class="responsive-img" src="../app/images/recipes/'.$item['main_pic'].'" style="height:320px;margin-top:40px;"></a>';
        echo '<a class="hide-on-med-and-up" href="recipe.php?id='.$item['id_recipe'].'"><img class="responsive-img" src="../app/images/recipes/'.$item['main_pic'].'" style="height:250px;margin-top:40px;"></a>';
        echo '<span class="card-title popular">No '.$i.'</span>';
      echo '</div>';
    echo '</div>';
  echo '</div>';
}else{
  echo '<div class="col s12 m3">';
    echo '<div class="card">';
      echo '<div class="card-image">';
        echo '<a class="container hide-on-small-only" href="recipe.php?id='.$item['id_recipe'].'"><img class="responsive-img" src="../app/images/recipes/'.$item['main_pic'].'" style="height:180px;"></a>';
        echo '<a class="hide-on-med-and-up" href="recipe.php?id='.$item['id_recipe'].'"><img class="responsive-img" src="../app/images/recipes/'.$item['main_pic'].'" style="height:250px;"></a>';
        echo '<span class="card-title popular">No '.$i.'</span>';
       echo '</div>';
    echo '</div>';
  echo '</div>';
}
endforeach;
echo '</div>';
echo '</div>';
echo '</div>';
?>