<?php 

$host = 'localhost';
$db   = 'testdb';
$user = 'root';
$pass = 'root';
$dsn = "mysql:host=$host;dbname=$db";

try {
  $connection =new PDO($dsn,$user,$pass);
 


    if(isset($_POST['sub1']))
    {
        if(empty($_POST['user']) || empty($_POST['pwd']) )
	    {
            echo "Please fill All the details";
        }
        else
        {
            $user=$_POST['user'];
            $pwd=$_POST['pwd'];
            $atype=$_POST['atype'];
            $sql="SELECT * from user_account where userid=:user and psswd=:pwd"; 
        
            $statement=$connection->prepare($sql);
            $statement->bindParam(':user',$user);
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
            
            // if($atype==Seller)
            //     header("location:sell.php");
            // else
            //     header('location:buy.php');
            header('location:signedin.php');
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
		User id:<input type="text" size=50 name="user" value=""><br><br>
        Account type: <select name="atype">
            <option>Select</option>
            <option>Seller</option>
            <option>Buyer</option>
        </select><br><br>
		Password:<input type="password" size=50 name="pwd" value=""><br><br>
		
		<input type="submit" name="sub1" value="Sign in"> <br><br>
		
		<button><a href="reg.php">You don't have an account?</a></button>



	</form>
</body>
</html>