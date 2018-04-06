<link rel="stylesheet" href="../app/css/cards.css">
<div class="row">
<?php
include("../app/data/process/selected_liked_list.php");
include("../app/data/process/recipe_has_inventory.php");
$likes = implode(",", $selected_likes_array);
$recipes = implode(",", $selected_recipes_array);
  
  if($ingredients == "" AND $likes != ""){
    echo '<p style="margin-bottom: -20px;font-weight: bold;">En base a tus gustos, te recomendamos las siguientes recetas. </br>Selecciona tu <a href="inventory.php">inventario</a> para ofrecerte recomendaciones en base a tus necesidades</p>';
    $sql = "SELECT id_recipe, name, main_pic FROM recipe WHERE category IN (".$likes.") ORDER BY RAND() LIMIT 12";
  }elseif($likes == "" AND $ingredients != ""){
    echo '<p style="margin-bottom: -20px;font-weight: bold;">En base a tu inventario, te recomendamos las siguientes recetas.</br>Selecciona tus <a href="likes.php">gustos</a> para ofrecerte lo que más te gusta.</p>';
    $sql = "SELECT id_recipe, name, main_pic FROM recipe WHERE id_recipe IN (".$recipes.") ORDER BY RAND() LIMIT 12";
  }elseif($likes == "" AND $ingredients == "" ){
    echo '<p style="margin-bottom: -20px;font-weight: bold;">Te recomendamos las siguientes recetas.</br>Selecciona tu <a href="inventory.php">inventario</a> y <a href="likes.php">gustos</a> para ofrecerte recomendaciones en base a tus necesidades</p>';
    $sql = "SELECT id_recipe, name, main_pic FROM recipe WHERE id_recipe IN (".$recipes.") ORDER BY RAND() LIMIT 12";
  }else{
    echo '<p style="margin-bottom: -20px;font-weight: bold;">En base a tus gustos e inventario, te recomendamos las siguientes recetas.</p>';
    $sql = "SELECT id_recipe, name, main_pic FROM recipe WHERE id_recipe IN (".$recipes.") AND category IN (".$likes.") ORDER BY RAND() LIMIT 12";
  }

$result=$mysqli->query($sql);
$rows = $result->num_rows;
while($row = mysqli_fetch_assoc($result)){
   echo '<div class="col s4 m2">';
        echo '<div class="card">';
            echo '<div class="card-image">';
             echo '<a href="recipe.php?id='.$row["id_recipe"].'"><img class="responsive-img" src="../app/images/recipes/'.$row["main_pic"].'" style="height:90px;margin-top:40px;"></a>';
              echo '<!--<span class="card-title popular">Recomendado</span>-->';
            echo '</div>';
          echo '</div>';
        echo '</div>';
} 
  $GLOBALS['has_inventory'] = $recipes;
  $has_likes = $likes;
  ?>
 </div>