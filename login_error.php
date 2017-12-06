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

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display">Username or password incorrect. Please, try again.</h1>
    </div>
  </div>


<body>

  <?php
    include 'templates\footer.php'
  ?>

</html>
