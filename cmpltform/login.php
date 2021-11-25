<?php


$servername='localhost';
$username='root';
$password='root';
$dbname='regfdb';

$conn=mysqli_connect($servername,$username,$password,$dbname);

$email="";
$pwd="";
if(isset($_COOKIE['email']) && isset($_COOKIE['pwd']))
{
    $email=$_COOKIE['email'];
    $pwd=$_COOKIE['pwd'];
}
if(isset($_GET['sub1']))
{
	$email=$_GET['email'];
	$pwd=$_GET['pwd'];

	$sql="SELECT * from employee where emp_mailid='$email'";

	$rs=mysqli_query($conn, $sql);
	$num=mysqli_num_rows($rs);

	if($num==1)
	{
		while($row=mysqli_fetch_assoc($rs)){
			if(password_verify($pwd, $row['emp_pwd']))
			{
				if(!empty($_GET['chkbox']))
{
    $email=$_GET['email'];
    setcookie('email',$email,time()+60*2,"/");

    $pwd=$_GET['pwd'];
    setcookie('pwd',$pwd,time()+60*2,"/");
    echo "Your Password is saved";
}
   else {
           setcookie("email","");
           setcookie("pwd","");
          echo "Cookies Not Set";
  }

				session_start();
				$_SESSION['email']=$email;
				$_SESSION['uname']=$row['emp_fname'];
				header('location:signedin.php');
			}



			else
				echo"Invalid Password";

			
		}
	}

	else
		echo"<font color=red>Please Enter the valid User id !</font>";

	mysqli_close($conn);
}
?>








<html>
<head><style>form{text-align: center;
}
 #box1{
            width: 800px;
            height: 300px;
            padding: 20px;
            text-align: center;
            border: 10px solid #042838;
            background-image: url(pic1.jpeg);
            background-repeat: no-repeat;
            background-size: 900px 500px ;
            margin: 10px 200px;
            border-radius: 25px 100px 50px;
        }   
    </style>
    </head>
<body align="center">

	<div id="box1">
	<form method="GET" action="">
		<h1 style="color:black"> Login Page...</h1>
		User id:<input type="email" size=50 name="email" value="<?=$email?>"><br><br>
		Password:<input type="password" size=50 name="pwd" value="<?=$pwd?>"><br><br>
		
		 Save Password:<input type='checkbox' name='chkbox'><br><br>
		<input type="submit" name="sub1" value="Sign in" id="b1"> <br><br>
		
		<button><a href="reg.php">You don't have an account?</a></button>

		<button><a href="forgot.php">Forgot Password?</a></button>


	</form>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <script>
    	
    	$(document).ready(
    		function(){
    			$("#b1").submit(function(){
    				alert("Click 'ok' to login Successfully");
    			})
    		}

    		);

    </script>
</html>