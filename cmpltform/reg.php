<?php
$servername='localhost';
$username='root';
$password='root';
$dbname='regfdb';

$conn=mysqli_connect($servername, $username, $password, $dbname);

if(isset($_GET['sub']))
{
	$id=$_GET['id'];
	$fname=$_GET['fname'];
	$lname=$_GET['lname'];
	$email=$_GET['email'];
	$pwd=$_GET['pwd'];
	$cpwd=$_GET['cpwd'];
	$dept=$_GET['dept'];
	$contact=$_GET['contact'];
	$city=$_GET['city'];
	$sec_a=$_GET['sec_a'];
	$gender=$_GET['emp_gender'];

	if($pwd==$cpwd)
	{
		$hash=password_hash($pwd, PASSWORD_DEFAULT);

		$sql="insert into employee(emp_id,emp_fname,emp_lname,emp_mailid,emp_pwd,emp_dept,emp_contact,emp_city,sec_ans,emp_gender) Values($id,'$fname','$lname','$email','$hash','$dept',$contact,'$city','$sec_a','$gender')";
	

		$rs=mysqli_query($conn, $sql);

		if($rs==true)
			echo"Registration Successfull!";
		else
			echo"Registration Failed!";
	}
	else
	{
		echo"<font color=red>Please Enter the Confirm Password as a Password.</font>";
	}

	mysqli_close($conn);
}
?>




<html>
<head>

		 <style>
        #box{
            width: 900px;
            height: 600px;
            padding: 25px;
            text-align: center;
            border: 10px solid darkgrey;
            background-image: url(pic2.jpeg);
            background-repeat: no-repeat;
            background-size:1000px 700px ;
            margin: 10px 150px;
            border-radius: 25px;
        }   




	</style>


	</head>
<body align="center">
	<div id="box">
	<h1 style="color:firebrick;"> Registration Page...</h1>
	<form method="GET" action="">

    Employee id:<input type="int" size=50 name="id" value=""><br><br>
    First Name:<input type="text" size=50 name="fname" value=""><br><br>
    Last Name:<input type="text" size=50 name="lname" value=""><br><br>
    Gender:<input type="radio" size=50 name="emp_gender" value="male">Male
    <input type="radio" size=50 name="emp_gender" value="female">Female<br><br>
    Email id:<input type="email" size=50 name="email" value="" required><br><br>
    Password:<input type="password" size=50 name="pwd" value="" required><br><br>
    Confirm Password:<input type="password" size=50 name="cpwd" value=""><br><br>
    Department:<input type="text" size=50 name="dept" value=""><br><br>
    Contact:<input type="int" size=20 name="contact" value="" required><br><br>
    City:<input type="text" size=50 name="city" value=""><br><br>
    What is your first school name?<input type="text" size=30 name="sec_a" value="" required><br><br>
    <input type="submit" name="sub" value="Submit"> <br><br>
    <a href="login.php">You have already an account?<input type="button" name="login" value="Login"></a>


	</form>
</div>

	





</body>
</html>