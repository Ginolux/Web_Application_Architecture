<?php
// Start the session
session_start();

if(isset($_POST["id"])) {
    $output_login = "";
    $output_not_login = "";

  try {
      include "connection.php";

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT movie.movie_id, movie.title, movie.description, movie.release_year, movie.duration, movie.rent_cost, category.name as category, store.store_id, store.name as store_name, store.address as store_address, language.name as language
                              FROM movie
                              INNER JOIN category ON movie.category_id=category.category_id
                              INNER JOIN store ON movie.store_id=store.store_id
                              INNER JOIN language ON movie.language_id=language.language_id
                              WHERE movie_id=:id");
      $stmt->bindParam(':id', $_POST["id"]);
      //$stmt->bindParam(':password', $password);
      $stmt->execute();

      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      $output_not_login = '
      <ul class="list-group" style="z-index:10">
        <li class="list-group-item active"><b>' . $result['title'] . '</b></li>
        <li class="list-group-item"><b>Description: </b>' . $result['description'] . '</li>
        <li class="list-group-item"><b>Language: </b>' . $result['language'] . '</li>
        <li class="list-group-item"><b>Released in: </b>' .$result['release_year'] . '</li>
        <li class="list-group-item"><b>Duration: </b>' . $result['duration'] . ' minutes </li>
        <li class="list-group-item"><b>Category: </b>' . $result['category'] . ' </li>
        <li class="list-group-item"><b>Available: </b>Yes
          <a class="btn btn-primary" style="display:block" href="login_register.php" role="button">Rent</a>
        </li>
        <li class="list-group-item"><b>Price: </b>' . $result['rent_cost'] . ' Euro </li>
      </ul>
      ';

      $output_login = '
      <ul class="list-group" style="z-index:10">
        <li class="list-group-item active"><b>' . $result['title'] . '</b></li>
        <li class="list-group-item"><b>Description: </b>' . $result['description'] . '</li>
        <li class="list-group-item"><b>Language: </b>' . $result['language'] . '</li>
        <li class="list-group-item"><b>Released in: </b>' .$result['release_year'] . '</li>
        <li class="list-group-item"><b>Duration: </b>' . $result['duration'] . ' minutes </li>
        <li class="list-group-item"><b>Category: </b>' . $result['category'] . ' </li>
        <li class="list-group-item"><b>Available: </b>Yes
          <a class="btn btn-primary" style="display:block" href="movie.php?q=' . $result['movie_id'] . '" role="button">Rent</a>
        </li>
        <li class="list-group-item"><b>Price: </b>' . $result['rent_cost'] . ' Euro </li>
      </ul>
      ';


      if (isset($_SESSION['login_user'])) {
          echo $output_login;
      }
      else {
        echo $output_not_login;
      }

      //print_r($result);
      //print("\n");

      }
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  $conn = null;

}


?>
