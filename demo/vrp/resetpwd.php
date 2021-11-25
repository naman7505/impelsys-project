<?php 
$email="";
$servername='localhost';
$username='root';
$password='root';
$dbname='forgetpwd';

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(isset($_GET['sub']))
{
	$email=$_GET['email'];
	$pwd=$_GET['pwd'];

	$sql="UPDATE userdet SET pwd = '$pwd' where emailid='$email'";
	$no=mysqli_query($conn, $sql);
	
	
	if($no==true)

		echo "Your Password has been changed successfully... Now you can login.";

	else
		echo "Something went wrong!";

	mysqli_close($conn);
}


?>


<html>
<body>
	<form method="GET">
    
    Enter your email id:<input type="text" size=20 name="email" value='<?=$email?>'><br><br><br>
    Reset Password:<input type='password' size='20' name='pwd' value=''><br><br>
    Confirm Password:<input type='password' size='20' name='cpwd' value=''><br><br>
    <input type='submit' value='Submit' name='sub'> 



	</form>
</body>
</html>