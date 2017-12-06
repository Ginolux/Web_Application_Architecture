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

  <div class=" row jumbotron">
<div class="col-md-5">
    <div class="form-area">
        <form role="form">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Contact Us</h3>
    				<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
					</div>
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>
                    </div>

        <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Submit Form</button>
        </form>
    </div>
</div>

<div class="col-md-2">

</div>

<div class="col-md-5">
</br></br><h2>First Store</h2>
    <p><b>Address: </b>kevin street, Ireland </p>
    <p><b>Phone: </b>08XXXXXXX </p>
    <p></p></br></br>

    <h2>Second Store</h2>
      <p><b>Address: </b>Henry street, Ireland </p>
      <p><b>Phone: </b>08XXXXXXX </p>
</div>

</div>


<body>

  <?php
    include 'templates\footer.php'
  ?>

</html>
