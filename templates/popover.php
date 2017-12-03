<?php

try {
    include "db/connection.php";

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM movie WHERE movie_id=:id");
    $stmt->bindParam(':id', $q);
    //$stmt->bindParam(':password', $password);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //print_r($result);
    //print("\n");

    }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>

<div class="my-popover-content hidden">
  <div>
    <b>my popover</b> - content
    <button type="button" class="btn btn-primary">Primary</button>
  </div>
</div>

<div class="my-popover-title hidden">
  <b>my popover</b> - title
</div>
