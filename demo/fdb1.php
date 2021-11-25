<?php

if(isset($_GET['submit']))
{

$DB_HOST="localhost";
$DB_USER="root";
$DB_PASSWORD="SRMIST#naman7505";
$DB_NAME="sys";



// Create connection
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$eid=$_GET['eid'];

$ename=$_GET['ename'];
$esal=$_GET['esal'];
$edept=$_GET['edept'];

$sql = "INSERT INTO emp (eid, ename, esal,edept)
VALUES ('$eid','$ename','$esal','$edept')";

$a=mysqli_connect($conn,$sql);

if ($a === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" ;
}

$conn->close();



}
?>
<html>
<body>
  <form method="GET" action="#">
  <input type="text" name="eid">
  <input type="text" name="ename">
  <input type="text" name="esal">
  <input type="text" name="edept">
  <input type="submit" name="submit">
  </form></body>
</html>
