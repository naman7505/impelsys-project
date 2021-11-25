
<?php
session_start();
$un="";
if(isset($_SESSION['email']))
   $un=$_SESSION['email'];
else
header('location:login.php');
if(isset($_GET['submit']))
	echo "page is working";

?>



<html>
<body>
User : <?php echo $un; ?>

<p align=right>
	<a href="logout.php"> Logout</a>


<form>
  Change Your Password:<br>
  
  New Password: <input type="password" name="newpass"><br>
  Confirm Password: <input type="password" name="conpass">
  <br>
  <input type="submit" name="submit" value="Update Your Password">
  &nbsp;&nbsp;
  <input type="reset" name="reset" value="Reset">

</form>
</body>
</html>