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

$conn=mysqli_connect($servername,$username,$password,$dbname);

$email="";
if(isset($_GET['sub3']))
{
	$email=$_GET['email'];
	$seca=$_GET['seca'];

	$sql="SELECT emp_fname from employee where emp_mailid='$email' and sec_ans='$seca'";
	//$sql="SELECT sec_ans from employee where emp_mailid='$email'";

	$flag="";
	$rs=mysqli_query($conn, $sql);

	if($row=mysqli_fetch_array($rs))
	{
		$flag=$flag.$row[0];
	}

	if(strlen($flag)>0)
	{
		session_start();
		$_SESSION['final']=$email;
		header('location:setpwd.php');
	}
	else
	{
		echo "<font color=orange>Your answer is wrong!</font>";
	}

	mysqli_close($conn);


}
?>




<html>
<body align=center>

	<h1> Please Enter the Answer</h1>

	<form method="GET" action="">

		User id:<input type="text" size=20 name="email" value="<?=$s?>" readonly><br><br>
		What is your first school name?<input type="text" size=20 name="seca" value=""><br><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  		<input type=submit name="sub3" value="Submit Answer">

	</form>
</body>
</html>