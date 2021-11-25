<?php


$host = 'localhost';
$db   = 'testdb';
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
  $str="";
  if (isset($_POST['sub'])) {
    
	$name=$_POST['name'];
	$pwd=$_POST['pwd'];
	$atype=$_POST['atype'];
    $contact=$_POST['contact'];
    $str=$str.substr($atype,0,1).substr($name,0,3).substr($contact,0,3);
    
	
        $sql="insert into user_account(name,psswd,atype,mobile,userid) Values('$name','$pwd','$atype','$contact','$str')";
  
    if ($connection->query($sql)) 
        // echo "You have successfully Registered!";
        echo "<br>Your User id is : ".$str;
    
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

    
    Name:<input type="text" size=50 name="name" value=""><br><br>
    
    Account Type:<input type="radio" size=50 name="atype" value="seller">Seller
    <input type="radio" size=50 name="atype" value="buyer">Buyer<br><br>
    
    Password:<input type="password" size=50 name="pwd" value="" required><br><br>
    
    
    Contact:<input type="int" size=20 name="contact" value="" required><br><br>
    <input type="submit" name="sub" value="Submit"> <br><br>

    
    <a href="login1.php">You have already an account?<input type="button" name="login" value="Login"></a>


	</form>

</body>
</html>