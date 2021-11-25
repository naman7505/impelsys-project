<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "reg";

$conn = mysqli_connect($servername, $username, $password, $dbname);


	if(isset($_GET['email']) && isset($_GET['pwd']))
	{
	
		$email=$_GET['email'];
		$pwd=$_GET['pwd'];

	$sql="SELECT * from emp where email='$email' and pwd='$pwd'";
	$rs=mysqli_query($conn, $sql);
	$x=mysqli_num_rows($rs);
	
	if($x>0)
	
		header("location:welcome.php");

	
	else
	
		echo"<font color=red>Invalid Email id or Password.</font>";
	
	//$flag=0;

	/*if($row=mysql_fetch_array($rs))
	{
		$flag=$row[0];
	}
	if($flag==1)
	{
		header("location:welcome.php");
	}
	else if($flag==0)
	{
        echo "User Doesn't exist";
	}
	else
	{
		echo "Not exist .Other issue";
	}
*/
	mysqli_close($conn);
}
	

?>



<html>
<body align="center">
	<h1>Login Form</h1>

<form name="login" method="GET" action="">

	User Id:<input type="email" size=50 placeholder="Enter mail id" name="email"><br><br>

	Password:<input type="password" size=50 name="pwd"><br><br>

	<input type="submit" name="sublogin" value="Sign in"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="reg.php">you don't have an account?<input type="button" name="sup" value="Sign up"></a><br><br>

	<a href="forget.php">Forget Password?</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


</form>
</body>
</html>
