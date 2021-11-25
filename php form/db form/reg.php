<?php
$servername = "localhost";
$username = "root";
$password = "SRMIST#naman7505";
$dbname = "reg";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$fname=$_GET['FirstName'];
$lname=$_GET['LastName'];
$email=$_GET['Email'];
$pwd=$_GET['pwd'];
$cpwd=$_GET['Cpwd'];

$sql="INSERT INTO emp (FirstName, LastName, Email, pwd, Cpwd) VALUES ('$fname', '$lname', '$email', '$pwd','$cpwd')";

$rs=mysqli_query($conn, $sql);

$conn.close();

?>

<html>
<body>
	<form method="GET" action="">
	First Name:<input type="text" name="$fname"><br>
	Last Name:<input type="text" name="$lname"><br>
	Email id:<input type="text" name="$email" required><br>
	Password:<input type="password" name="$pwd" required><br>
	Confirm Password:<input type="password" name="$cpwd" required><br>
	<input type="submit" name="sub" value="Sign up"><br>

	<?php
	require "sub.php";
	?>

</form>
</body>
</html>


