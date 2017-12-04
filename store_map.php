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

  $map_1='
    <div>
      <iframe width="600" height="450" frameborder="0" style="border:5px"
      src="https://www.google.com/maps/embed/v1/place?q=Dublin%20Institute%20of%20Technology%2C%20Kevin%20Street%2C%20Dublin%208&key=AIzaSyArjW3domvBlhq1USHxzhdpX51VU8gCbM8" allowfullscreen></iframe>
    </div>
  ';

  $map_2='
    <div>
      <iframe width="600" height="450" frameborder="0" style="border:5px"
      src="https://www.google.com/maps/embed/v1/place?q=Dublin+Institute+of+Technology,+Bolton+Street,+Dublin+1&key=AIzaSyArjW3domvBlhq1USHxzhdpX51VU8gCbM8" allowfullscreen></iframe>
    </div>
  ';

  if($q==1){
    echo '<h1>First store location</h1>';
    echo $map_1;
  }
  elseif($q==2){
    echo '<h1>Second store location</h1>';
    echo $map_2;
  }
  else {
    echo '<h1>First store location</h1>';
    echo $map_1;
    echo '<h1>Second store location</h1>';
    echo $map_2;
  }

  ?>





<body>

  <?php
    include 'templates\footer.php'
  ?>
</html>
