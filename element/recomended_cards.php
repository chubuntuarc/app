<?php
  //Html tags
  echo '<div class="recomended-title" style="background-color: '.$main_color.';color:#FFF;">';
  echo '<h2 class="container">Recomendados</h2>';
  echo '</div>';
  echo '<div class="container" >';
  echo '<link rel="stylesheet" href="../app/css/cards.css">';
  echo '<div class="row">'; 
  echo '<p style="margin-bottom: -20px;font-weight: bold;">En base a tus gustos e inventario, te recomendamos las siguientes recetas.</p>';
  //Content
  $recipes = Recipe::getRecomendedRecipes($id_user);
  foreach($recipes as $item):
  echo '<div class="col s4 m2">';
  echo '<div class="card">';
      echo '<div class="card-image">';
       echo '<a href="recipe.php?id='.$item['id_recipe'].'"><img class="responsive-img" src="../app/images/recipes/'.$item["main_pic"].'" style="height:90px;margin-top:40px;"></a>';
        echo '<!--<span class="card-title popular">Recomendado</span>-->';
      echo '</div>';
    echo '</div>';
  echo '</div>';
  endforeach;
echo '</div>';
echo '</div>';
  ?>
