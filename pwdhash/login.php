
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Reset Your Password</title>
</head>
<body>
<form method=get>
  Email ID: <input type="text" name ="mail" value=""><br>
   Password: <input type="password" name="pwd"><br>  
  <br>
  <input type="submit" name="submit" value="Login">
  &nbsp;&nbsp;
  <input type="reset" name="reset" value="Reset">
</form>
<?php
require_once('function.php');
session_start();
if(isset($_GET['submit']))
  {
    
    $pwd=trim($_GET['pwd']);
   // $pwd=password_hash($pwd,PASSWORD_DEFAULT);  
    $userid=trim($_GET['mail']);
    $con=connOpen();

    $sql="select password from login2 where userid='$userid'";
    echo $sql;
    $rs=mysqli_query($con,$sql);
    $flag=false;
    while($row=mysqli_fetch_assoc($rs))
    {
       $existingpwd=$row['password'];
    //   $existingpwd=password_hash($existingpwd,PASSWORD_DEFAULT);  
       echo "<br>Existing pwd:".$existingpwd."<br>";
     //  echo "<br>Yes2:".$pwd.
       if(password_verify($pwd,$existingpwd))  // 1st Value shoudl be in text format
        {
           $flag=true;
        } 

    }
    if($flag==true)
    {
      //echo "<br>Valid";
      $_SESSION['email']=$userid;
      header('location:nextpage.php');
    }
    else
      echo "<br>Invaild";
    closeConn($con);
  }
  
  
?>
</body>
</html>