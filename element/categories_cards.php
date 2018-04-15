<?php
//Objects
$categories = Category::getAllCategories();
//Html tags
echo '<div class="row">';
echo '<div class="recomended-title" style="background-color: '.$second_color.';color:#FFF;">';
echo '<h2 class="container">Categorías</h2>';
echo '</div>';
echo '<div class="container" style="margin-top:20px;">';
foreach($categories as $item):
  echo '<div class="col s4 m2">';
    echo '<div class="card">';
      echo '<div class="card-image">';
        echo '<a href="category_list?id='.$item["id_category"].'"><img class="responsive-img" style="height:90px;" src="../app/images/categories/'.$item["photo"].'"></a>';
        echo '<span class="card-title popular" style="font-size:14px;">'.$item["name"].'</span>';
      echo '</div>';
    echo '</div>';
  echo '</div>';
endforeach;
echo '</div>';
echo '</div>';
  ?>