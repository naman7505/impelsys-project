<?php
$servername='localhost';
$username='root';
$password='root';
$dbname='testdb';

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
{
	echo "Please Check Your Connection";
}

?>