

<?php

$q = intval($_GET['q']);
if(!empty($q)) {
        //PHP start
        try {
            include "db/connection.php";

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT movie_id FROM movie WHERE category_id=:category_id");
            $stmt->bindParam(':category_id', $q);
            //$stmt->bindParam(':password', $password);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $i = 1;
            //$start and $stop variable defined in the category php files
            foreach($result as $row) {
              if($i > $start AND $i < $stop )

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
}
        ?>
