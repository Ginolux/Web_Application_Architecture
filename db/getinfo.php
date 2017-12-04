<?php
if(isset($_POST["id"])) {
  $output = "";
  try {
      include "connection.php";

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT movie.movie_id, movie.title, movie.description, movie.release_year, movie.duration, movie.rent_cost, category.category_id as category_id, category.name as category, store.store_id, store.name as store_name, store.address as store_address
                              FROM movie
                              INNER JOIN category ON movie.category_id=category.category_id
                              INNER JOIN store ON movie.store_id=store.store_id
                              WHERE movie_id=:id");
      $stmt->bindParam(':id', $_POST["id"]);
      //$stmt->bindParam(':password', $password);
      $stmt->execute();

      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      $output = '
      <ul class="list-group" style="z-index:10">
        <li class="list-group-item active"><b>' . $result['title'] . '</b></li>
        <li class="list-group-item"><b>Description: </b></br>' . $result['description'] . '</li>
        <li class="list-group-item"><b>Released in: </b>' .$result['release_year'] . '</li>
        <li class="list-group-item"><b>Duration: </b>' . $result['duration'] . ' minutes </li>
        <li class="list-group-item"><b>Category: </b>' . $result['category'] . ' </li>
        <li class="list-group-item"><b>Available: </b>Yes
          <a class="btn btn-primary" style="display:block" href="#" role="button">Rent</a>
        </li>
        <li class="list-group-item"><b>Price: </b>' . $result['rent_cost'] . ' Euro </li>
      </ul>

      ';

      echo $output;

      //print_r($result);
      //print("\n");

      }
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  $conn = null;

}


?>
