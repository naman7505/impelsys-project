<?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'root');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'userdet');

function connOpen()
{
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

   if (mysqli_connect_errno()) 
   {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      die('Thank you');
      exit;
    }
    mysqli_autocommit($conn,true);
	return $conn;
}
function closeConn($con)
{
	mysqli_close($con);
}
?>