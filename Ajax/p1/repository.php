<?php
include "db.php";
$return_arr = array();
if(isset($_REQUEST['deptname']))
{
$dname=$_REQUEST['deptname'];
$query = "SELECT * FROM user where dept='$dname' ORDER BY NAME";
$result = mysqli_query($con,$query);

// while($row = $result->mysql_fetchAll()){

// }
while($row = mysqli_fetch_array($result))
{
    $id = $row['id'];
    $username = $row['username'];
    $name = $row['name'];
    $email = $row['email'];
    $return_arr[] = array("id" => $id,
    "username" => $username,
    "name" => $name,
    "email" => $email);
}
//print_r ($return_arr);
// Encoding array in JSON format
echo json_encode($return_arr,JSON_PRETTY_PRINT);
}