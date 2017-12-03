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

  <div class="flex-row d-flex flex-nowrap">
      <?php
        $start = 0;
        $stop = 8;
        include 'templates/list_movies.php'
      ?>
  </div>

  <div class="flex-row d-flex flex-nowrap">
      <?php
        $start = 8;
        $stop = 16;
        include 'templates/list_movies.php'
      ?>
  </div>

  <div class="flex-row d-flex flex-nowrap">
      <?php
        $start = 16;
        $stop = 24;
        include 'templates/list_movies.php'
      ?>
  </div>

  <div class="flex-row d-flex flex-nowrap">
      <?php
        $start = 24;
        $stop = 32;
        include 'templates/list_movies.php'
      ?>
  </div>


<body>
</html>
