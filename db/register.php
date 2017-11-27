<?php
//if(isset($_POST['submit'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "Yes! It works!";
  $username = test_input($_POST["username"]);
  $dob = test_input($_POST["dob"]);
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);
  $re_password = test_input($_POST["re_password"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo "The username is: $username";
echo "The DOB is: $dob";
echo "The email is: $email";
echo "The password is: $password";
echo "The re-password is: $re_password";

//Insert  into database
try {
    include "connection.php";
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO customer (username, email, dob, pwd)
    VALUES (:username, :email, :dob, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':dob', $dob);
    $stmt->bindParam(':password', $password);


    $stmt->execute();

    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;


?>
