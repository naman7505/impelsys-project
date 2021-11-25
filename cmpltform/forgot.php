<?php 

$servername='localhost';
$username='root';
$password='root';
$dbname='regfdb';

$conn=mysqli_connect($servername,$username,$password,$dbname);

$email="";
if(isset($_GET['sub2']))
{
	$email=$_GET['email'];

	$sql="SELECT emp_fname from employee where emp_mailid='$email'";

	$flag="";

	$rs=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_array($rs))
	{
		$flag=$flag.$row[0];
	}

	if(strlen($flag)>0)
	{
		session_start();
		$_SESSION['final']=$email;

		header('location:secq.php');
	}
	else
		{
		echo"Please Enter the Valid User id...";
	}

	mysqli_close($conn);



}
?>





<html>
<body align="center">
<h1>Please verify User id</h1>
<form method="GET" action="">

User id:<input type="email" size=50 name="email" value="<?=$email?>"> <br><br>
<input type="submit" name="sub2" value="Verify">

</form>
</body>
</html>







