<?php
$servername = "localhost";
$username = "root";
$password = "SRMIST#naman7505";
$dbname = "demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO emp (eid, ename, esal,edept)
VALUES (01, 'vineet', 200,347)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" ;
}

$conn->close();




?>
