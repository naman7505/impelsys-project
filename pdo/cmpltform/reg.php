<?php


$host = 'localhost';
$db   = 'regfdb';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
  $connection =new PDO($dsn,$user,$pass,$options);
//   session_start();
//   $_SESSION['var']=array();
//     $sql1="select max(emp_id)+1 from employee";
//     $stmt=$connection->prepare($sql1);
//     $stmt->execute();
//     $user=$stmt->fetchAll();
//     $str="";
//     $id="";
    
//     array_push($_SESSION['var'],$user[0]);
//     foreach($user as $key=>$val){
//     print_r($val);
//     }
    //print_r($_SESSION['var'][0]);
    //print(gettype($user[0]));
    //$str=$str.(string)$user[0];
    //print_r($str);

  if (isset($_POST['sub'])) {
    $id=$_POST['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];
	$cpwd=$_POST['cpwd'];
	$dept=$_POST['dept'];
	$contact=$_POST['contact'];
	$city=$_POST['city'];
	$sec_a=$_POST['sec_a'];
	$gender=$_POST['emp_gender'];
    if($pwd==$cpwd)
	{
		$sql="insert into employee(emp_id,emp_fname,emp_lname,emp_mailid,emp_pwd,emp_dept,emp_contact,emp_city,sec_ans,emp_gender) Values($id,'$fname','$lname','$email','$pwd','$dept',$contact,'$city','$sec_a','$gender')";
  
    if ($connection->query($sql)) 
        echo "Registration Successfull ";
    }
    else
        echo "Registration Failed!";
  }
}
    catch (PDOException $e) {
        echo "Not Done";
    }

?>



<html>
<body align="center">
	<h1 style="color:green"> Registration Page...</h1>
	<form method="POST" action="">

    Employee id:<input type="int" size=50 name="id" value="" ><br><br>
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

</body>
</html>