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
        $stmt = $conn->prepare("SELECT * FROM movie WHERE movie_id=:id");
        $stmt->bindParam(':id', $q);
        //$stmt->bindParam(':password', $password);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $output = '
        </div>
        <ul class="list-group">
          <li class="list-group-item active"><b>' . $result['title'] . '</b></li>
          <li class="list-group-item"><b>Description: </b></br>' . $result['description'] . '</li>
          <li class="list-group-item"><b>Released in: </b>' .$result['release_year'] . '</li>
          <li class="list-group-item"><b>Duration: </b>' . $result['duration'] . ' minutes </li>
          <li class="list-group-item"><b>Price: </b>' . $result['rent_cost'] . ' Euro </li>
        </ul>
        </div>
        ';

        echo $output;

        //print_r($result);
        //print("\n");

        }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;

  } ?>

<body>
</html>
