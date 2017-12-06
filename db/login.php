<?php
// Start the session
session_start();
?>

<?php
//if(isset($_POST['submit'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //echo "Yes! It works!";
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);
}

// PHP security function
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


try {
    include "connection.php";

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT username, email, pwd FROM customer WHERE email=:email AND pwd=:password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //$result = $stmt->fetch();

    //print_r($result);
    //print("\n");


    if ($result > 0) {
      //echo '<p> The logged in user is : ' . $result['username'] . '</p>';
      $_SESSION["logged_in"] = true;
      $_SESSION['login_user'] = $result['username']; // Initializing Session

      $cookie_name = "user";
      $cookie_value = $result['username'];
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
      //header("location: profile.php"); // Redirecting To Other Page
      header("location: ../index.php"); // Redirecting To Other Page

      }
      else
      {
          echo 'The username or password is incorrect!';
          header("location: ../login_error.php");
          //header("location: ../error.php");
      }

    }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>
