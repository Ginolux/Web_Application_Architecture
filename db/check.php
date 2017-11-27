<?php



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


    // insert a row
    $username = "John";
    $email = "john@example.com";
    $dob = "2001-11-11";
    $password = "d4eeeeee";
    $stmt->execute();

    // insert another row
    $username = "Jack";
    $email = "jack@example.com";
    $dob = "2010-11-11";
    $password = "d4eeeeee";
    $stmt->execute();

    // insert another row
    $username = "Jane";
    $email = "jane@example.com";
    $dob = "2001-11-11";
    $password = "d4eeeeee";
    $stmt->execute();

    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;




 ?>
