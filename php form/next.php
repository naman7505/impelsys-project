<?php

$msg="";

if(isset($_GET['uid']) && isset($_GET['pwd']))
{
	$name=$_GET['uid'];
	$pwd=$_GET['pwd'];
	//echo "<br>Name: $name Pwd: $pwd";

	if($name=="abc@gmail.com" && $pwd=="impelsys")
		header('location:loggedin.php');
	else
		$msg="<font color=red>User Id or Password is wrong!</font>";
		
}


?>



<html>
<body align="center">
	<h1>Login Form</h1>

<form name="login" method="GET" action="">

	User Id:<input type="email" size=50 placeholder="Enter mail id" name="uid"><br><br>

	Password:<input type="password" size=50 name="pwd"><br><br>

	<input type="submit" name="sublogin" value="Sign in"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="form.php">you don't have an account?<input type="button" name="sup" value="Sign up"></a><br><br>

	<a href="forget.php">Forget Password?</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php
echo "$msg";
?>

</form>
</body>
</html>
