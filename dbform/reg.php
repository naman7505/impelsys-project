<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "reg";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_GET['sub']))
{
	$fname=$_GET['fname'];
$lname=$_GET['lname'];
$email=$_GET['email'];
$pwd=$_GET['pwd'];

$sql="Insert into emp (fname,lname,email,pwd) Values ('$fname', '$lname', '$email', '$pwd')";

$no=mysqli_query($conn, $sql);

if($no==true)

	echo "Registration successfull";

else
	echo "Not Done";


mysqli_close($conn);
}


?>

<html>
<body align="center">
	<h1>Registration Form</h1>
	<form method="GET" align=center action="">
	<label for="fname">First Name:</label>
	<input type="text" id="fname" name="fname"><br><br><br>
	<label for="lname">Last Name:</label>
	<input type="text" id="lname" name="lname"><br><br><br>
	<label for="email">Email id:</label>
	<input type="text" id="email" name="email" required><br><br><br>
	<label for="pwd">Password:</label>
	<input type="password" id="pwd" name="pwd" required><br><br><br>
	<label for="cpwd">Confirm Password:</label>
	<input type="password" id="cpwd" name="cpwd" required><br><br>
	<input type="submit" name="sub" value="Sign up"> <br><br>
	<a href="signin.php">Already you have account?<input type="button" value="Login" name="login" ></a>

<?php
require 'sub.php';
?>
	
</form>
</body>
</html>


