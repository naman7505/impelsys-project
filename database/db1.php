<?php

if(isset($_GET['submit']))
{
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'root');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'sys');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);/
$empno=$_GET['empno'];
$ename=$_GET['ename'];
$sal=$_GET['sal'];
$deptno=$_GET['deptno'];
$job=$_GET['job'];
// }
$sql = "INSERT INTO emp (empno,ename,sal,deptno,job) VALUES ('$empno','$ename','$sal','$deptno','$job')";
$nor = mysqli_query($conn, $sql);
if($nor>0)
echo "Added succ...";
else
echo "Not added. Some issue.";
mysqli_close($conn);
}
?>