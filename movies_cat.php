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

  <div class="category">
    <h2>
      <?php
          switch ($_GET['q']) {
          case "1":
              echo '<a href="#" style=" text-decoration: none">Action</a>';
              break;
          case "2":
              echo '<a href="#" style=" text-decoration: none">Comedy</a>';
              break;
          case "3":
              echo '<a href="#" style=" text-decoration: none">Romance</a>';
              break;
          case "4":
              echo '<a href="#" style=" text-decoration: none">Horror</a>';
              break;
          default:
              echo '<a href="#" style=" text-decoration: none">Category</a>';
          }
      ?>
    </h2>
  </div>



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

  <?php
    include 'templates\footer.php'
  ?>

</html>
