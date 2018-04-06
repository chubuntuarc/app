<?php
include("data/day_recipe.php");
include("data/first_sponsor.php");
include("data/second_sponsor.php");
include("data/first_sponsor_logo.php");
include("data/second_sponsor_logo.php");
?>
<link rel="stylesheet" href="../app/css/cards.css">
<div class="row">
        <div class="col s12 m8">
          <div class="card">
            <div class="card-image">
              <?php echo '<a href="recipe.php?id='.$day_recipe_id.'"><img src="../app/images/recipes/'.$day_recipe_pic.'" style="height:425px;"></a>'; ?>
              <span class="card-title today" style="background-color: #ff6624;border-radius: 0 10px 0 10px;">Receta del día</span>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <?php echo '<a href="recipe.php?id='.$sponsor_recipe_id.'"><img src="../app/images/recipes/'.$sponsor_recipe_pic.'" style="height:200px;"></a>'; ?>
               <?php echo '<img src="../app/images/sponsors/'.$first_sponsor_logo.'" style="position: absolute; width: 50px;left: 10px;top:10px;">'; ?>
              <span class="card-title sponssor">Patrocinado</span>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
             <?php echo '<a href="recipe.php?id='.$second_sponsor_recipe_id.'"><img class="responsive-img" src="../app/images/recipes/'.$second_sponsor_recipe_pic.'" style="height:200px;"></a>'; ?>
              <?php echo '<img src="../app/images/sponsors/'.$second_sponsor_logo.'" style="position: absolute; width: 50px;left: 10px;top:10px;">'; ?>
              <span class="card-title sponssor">Patrocinado</span>
            </div>
          </div>
        </div>
      </div>