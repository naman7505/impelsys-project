<?php


$servername='localhost';
$username='root';
$password='root';
$dbname='testdb';

$conn=mysqli_connect($servername,$username,$password,$dbname);



if(isset($_POST['sub1']))
{
	$user=$_POST['user'];
	$pwd=$_POST['pwd'];
    $atype=$_POST['atype'];

	$sql="SELECT * from user_account where userid='$user' and psswd='$pwd'";

	$rs=mysqli_query($conn, $sql);
	$num=mysqli_num_rows($rs);

	if($num==1)
	{
        while($row=mysqli_fetch_assoc($rs))
        {
	
	        session_start();
		    $_SESSION['name']=$row['name'];
		    $_SESSION['contact']=$row['mobile'];

            if($row['atype']=='seller')
            {

		        header('location:sell.php');
            }
            else
            {
                header('location:buy.php');
            }
	    }
    }



	else
    {
		echo"Invalid Password";

	}
	}

	

	mysqli_close($conn);

?>








<html>
<head>
    </head>
<body align="center">

	<div id="box1">
	<form method="POST" action="">
		<h1 style="color:black"> Login Page...</h1>
		User id:<input type="text" size=50 name="user" value=""><br><br>
        Account type: <select name="atype">
            <option>Select</option>
            <option>Seller</option>
            <option>Buyer</option>
        </select><br><br>
		Password:<input type="password" size=50 name="pwd" value=""><br><br>
		
		 
		<input type="submit" name="sub1" value="Sign in" id="b1"> <br><br>
		
		<button><a href="reg.php">You don't have an account?</a></button>

		


	</form>
</div>
</body>
</html>