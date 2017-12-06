<div class="category">
  <h2>
     <a href="movies_cat.php?q=2" style=" text-decoration: none">Comedy</a>
  </h2>
</div>

<div class="scrollable">
  <div id="scrollable_2" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="flex-row d-flex flex-nowrap">

        <?php
        //PHP start
        try {
            include "db/connection.php";

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT movie_id FROM movie WHERE category_id=2");
            //$stmt->bindParam(':category_id', '1');
            //$stmt->bindParam(':password', $password);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $i = 1;
            foreach($result as $row) {
              if($i < 8 )

              {?>

                <div class="list_item">
                  <a  class="my-popover" id="<?php echo $row['movie_id']; ?>" href="movie.php?q=<?php echo $row['movie_id']; ?>"><img class="d-block w-100" src="http://via.placeholder.com/225x315"></a>
                </div>


            <?php } $i++;
             }
            //Continue PHP

            }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;

        ?>

      </div>
    </div>


    <div class="carousel-item">
      <div class="flex-row d-flex flex-nowrap">

        <?php
        $k = 1;
        foreach($result as $row) {
          $k++;
          if($k >= 8 AND $k <15) { ?>

            <div class="list_item">
              <a  class="my-popover" id="<?php echo $row['movie_id']; ?>" href="movie.php?q=<?php echo $row['movie_id']; ?>"><img class="d-block w-100" src="http://via.placeholder.com/225x315"></a>
            </div>

       <?php }
          } ?>

      </div>
    </div>

  <a class="carousel-control-prev" href="#scrollable_2" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#scrollable_2" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
</div>
