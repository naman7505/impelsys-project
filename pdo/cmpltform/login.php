<?php 

$host = 'localhost';
$db   = 'regfdb';
$user = 'root';
$pass = 'root';
$dsn = "mysql:host=$host;dbname=$db";

try {
  $connection =new PDO($dsn,$user,$pass);
 


    if(isset($_POST['sub1']))
    {
        if(empty($_POST['email']) || empty($_POST['pwd']) )
	    {
            echo "Please fill All the details";
        }
        else
        {
            $email=$_POST['email'];
            $pwd=$_POST['pwd'];
            $sql="SELECT * from employee where emp_mailid=:email and emp_pwd=:pwd"; 
        
            $statement=$connection->prepare($sql);
            $statement->bindParam(':email',$email);
            $statement->bindParam(':pwd',$pwd);
            $statement->execute();
            // $statement->execute(

            //                 array(
            //                     'email' => $_POST["email"],
            //                     'pwd'=> $_POST["pwd"]
            //                 )
            //                 );
        $count = $statement->rowCount();
        if($count>0)
        {
            // while($row=$statement->fetch(PDO::FETCH_ASSOC($statement)))
            // {
            //     session_start();
            //     $_SESSION['uname']=$row['emp_fname'];
            // }
            
            header("location:signedin.php");
        } 
        else{
            echo "<font color=red>User id or Password is INVALID!</font>";
        }
    }
}
}
    catch(PDOException $error)
    {
        echo "Not Done";
    }



?>



<html>
<head><style>form{text-align: center;
}</style></head>
<body align="center">

	
	<form method="POST" action="">
		<h1 style="color:purple"> Login Page...</h1>
		User id:<input type="email" size=50 name="email" value=""><br><br>
		Password:<input type="password" size=50 name="pwd" value=""><br><br>
		
		 Save Password:<input type='checkbox' name='chkbox'><br><br>
		<input type="submit" name="sub1" value="Sign in"> <br><br>
		
		<button><a href="reg.php">You don't have an account?</a></button>

		<button><a href="forgot.php">Forgot Password?</a></button>


	</form>
</body>
</html>