<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

  <?php
    include '../templates/head.php'
  ?>

<body>

  <?php
    include '../templates/front_carousel.php'
  ?>

  <?php
    include '../templates/navigation.php'
  ?>

  <h1>Search Results:</h1>

<?php
//if(isset($_POST['submit'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //echo "Yes! It works! $search";
  $search = test_input($_POST["search"]);
}

// PHP security function
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



echo "<table style='border: solid 1px black;'>";
echo "<tr>
<th>Id</th><th>Title</th>
<th>Description</th>
<th>Year</th>
<th>Duration</th>
<th>Cost</th>
<th>Category</th>
<th>Store</th>
</tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}


try {
    include "connection.php";

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT DISTINCT title, description, release_year, duration, rent_cost, category.name, store.name
                            FROM movie
                            INNER JOIN category ON movie.category_id=category.category_id
                            INNER JOIN store ON movie.store_id=store.store_id WHERE (title LIKE '%$search%' OR release_year LIKE '%$search%' OR category.name LIKE '%$search%' OR store.name LIKE '%$search%' OR rent_cost LIKE '%$search%')");
    //$stmt->bindParam(':search', $search);
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    //print_r($result);
    //print("\n");


    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }

    }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>

</body>
</html>
