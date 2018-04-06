<?php
include("data/popular/first_popular.php");
include("data/popular/second_popular.php");
include("data/popular/third_popular.php");
include("data/popular/fourth_popular.php");
include("data/popular/fifth_popular.php");
?>
<link rel="stylesheet" href="../app/css/cards.css">
<div class="row">
        <div class="col s12 m6">
          <div class="card">
            <div class="card-image">
              <?php echo '<a href="recipe.php?id='.$first_popular_id.'"><img class="responsive-img" src="../app/images/recipes/'.$first_popular_pic.'" style="height:320px;margin-top:40px;"></a>'; ?>
              <span class="card-title popular">No 1</span>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card">
            <div class="card-image">
              <?php echo '<a href="recipe.php?id='.$second_popular_id.'"><img class="responsive-img" src="../app/images/recipes/'.$second_popular_pic.'" style="height:180px;"></a>'; ?>
              <span class="card-title popular">No 2</span>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card">
            <div class="card-image">
              <?php echo '<a href="recipe.php?id='.$third_popular_id.'"><img class="responsive-img" src="../app/images/recipes/'.$third_popular_pic.'" style="height:180px;"></a>'; ?>
              <span class="card-title popular">No 3</span>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card">
            <div class="card-image">
              <?php echo '<a href="recipe.php?id='.$fourth_popular_id.'"><img class="responsive-img" src="../app/images/recipes/'.$fourth_popular_pic.'" style="height:180px;"></a>'; ?>
              <span class="card-title popular">No 4</span>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card">
            <div class="card-image">
              <?php echo '<a href="recipe.php?id='.$fifth_popular_id.'"><img class="responsive-img" src="../app/images/recipes/'.$fifth_popular_pic.'" style="height:180px;"></a>'; ?>
              <span class="card-title popular">No. 5</span>
            </div>
          </div>
        </div>
      </div>