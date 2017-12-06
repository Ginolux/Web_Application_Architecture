<?php
// Start the session
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

  <?php
    include 'templates/head.php'
  ?>

<body>

  <?php
    include 'templates/front_carousel.php'
  ?>

  <?php
    include 'templates/navigation.php'
  ?>

  <?php
  $q = intval($_GET['q']);
  if(!empty($q)) {
    $output = "";
    try {
        include "db/connection.php";

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT movie.movie_id, movie.title, movie.description, movie.release_year, movie.duration, movie.rent_cost, category.name as category, store.store_id, store.name as store_name, store.address as store_address, language.name as language
                                FROM movie
                                INNER JOIN category ON movie.category_id=category.category_id
                                INNER JOIN store ON movie.store_id=store.store_id
                                INNER JOIN language ON movie.language_id=language.language_id
                                WHERE movie_id=:id");
        $stmt->bindParam(':id', $q);
        //$stmt->bindParam(':password', $password);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $output = '

        <ul class="list-group">
          <li class="list-group-item active"><b>' . $result['title'] . '</b></li>
          <li class="list-group-item"><b>Description: </b></br>' . $result['description'] . '</li>
          <li class="list-group-item"><b>Language: </b>' . $result['language'] . '</li>
          <li class="list-group-item"><b>Released in: </b>' .$result['release_year'] . '</li>
          <li class="list-group-item"><b>Duration: </b>' . $result['duration'] . ' minutes </li>
          <li class="list-group-item"><b>Category: </b>' . $result['category'] . ' </li>
          <li class="list-group-item"><b>Available in: </b>' . $result['store_name'] . '
            <a class="btn btn-primary" style="display:block" href="login_register.php" role="button">Rent</a>
          </li>
          <li class="list-group-item"><b>Store address: </b>' . $result['store_address'] . '
            <a class="btn btn-primary btn-sm" href="store_map.php?q=' . $result['store_id'] . '" role="button">Location</a>
          </li>
          <li class="list-group-item"><b>Price: </b>' . $result['rent_cost'] . ' Euro </li>
        </ul>

        ';



        //echo $output;

        //print_r($result);
        //print("\n");

        }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;

  } ?>

  <div class="container-fluid">
    <div class="category">
      <h1 >
         <b>Movie: </b><?php echo $result['title']; ?>
      </h1>
    </div>
    <div class="row" style="margin-top: 3em">
      <div class="col-6 col-md-4"><img class="d-block w-100" src="http://via.placeholder.com/1000x1500"></div>
      <div class="col-6 col-md-4"><?php echo $output; ?></div>
      <div class="col-6 col-md-4"><?php include "distance.php"; ?></div>
    </div>
  </div>

<body>

  <?php
    include 'templates\footer.php'
  ?>
</html>
