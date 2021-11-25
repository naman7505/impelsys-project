<?php

if(isset($_GET['pwd']) && isset($_GET['rpwd']))
{
	$pwd=$_GET['pwd'];
	$rpwd=$_GET['rpwd'];

	if($pwd==$rpwd)
		 echo "<font color=green>Your Password has been Updated Successfully! Now You can login here..."."<a href=login.php>Login</a>";
	else
		echo"<font color=red>Please Enter the Retype_Password same as a New_Password.</font>";
}
?>