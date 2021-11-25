<?php 
$s="";
session_start();
if(isset($_SESSION['final']))
{
	$s=$s.$_SESSION['final'];
}
$servername='localhost';
$username='root';
$password='root';
$dbname='regfdb';

$conn=mysqli_connect($servername, $username, $password, $dbname);

$email="";
if(isset($_GET['subf']))
{
	$email=$_GET['email'];
	$pwd=$_GET['pwd'];

	$sql="UPDATE employee set emp_pwd='$pwd' where emp_mailid='$email'";

	$msg="";
	$rs=mysqli_query($conn, $sql);

	if($rs==true)
		echo"$msg";
	else
		echo"<font color=red>Something went wrong!</font>";

	mysqli_close($conn);


}
?>






<html>
<body align="center">

<h1>Set New Password</h1>

	<form method="GET" action="">

		User id:<input type="text" size=20 name="email" value="<?=$s?>" readonly><br><br>

		New_Password:<input type="password" size=20 name="pwd" value=""><br><br>

		Retype_Password:<input type="password" size=20 name="rpwd" value=""><br><br>

		<input type="submit" name="subf" value="Update">




	</form>

	<?php
require "setsamepwd.php";
?>
</body>
</html>