<link rel="stylesheet" href="../app/css/cards.css">
<div class="row">
  <?php
    require("../app/data/connect.php");
    $sql = "SELECT id_category ,name,photo FROM categories";
    $result=$mysqli->query($sql);
    $rows = $result->num_rows;
    while($row = mysqli_fetch_assoc($result)){
      echo '<div class="col s4 m2">';
        echo '<div class="card">';
          echo '<div class="card-image">';
            echo '<a href="category_list?id='.$row["id_category"].'"><img class="responsive-img" style="height:90px;" src="../app/images/categories/'.$row["photo"].'"></a>';
            echo '<span class="card-title popular" style="font-size:14px;">'.$row["name"].'</span>';
          echo '</div>';
        echo '</div>';
      echo '</div>';
    } 
  ?>
</div>