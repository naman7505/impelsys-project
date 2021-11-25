.
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Reset Your Password</title>
</head>
<body>
<form>   
<?php
  /* 
  CREATE TABLE login2 (
  userid varchar(255) NOT NULL primary key,
  password varchar(255) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  */
      require_once('function.php');
      $con=connOpen();  
   //  $pwd=$_GET['pwd'];  
      $hashed_pwd = password_hash('pwd1', PASSWORD_DEFAULT);
      // $hashed_pwd='1bb';
      $sql="insert into login2 values('user1','$hashed_pwd')";      
      echo $sql."<br>";
      $flag=mysqli_query($con,$sql);// or die(mysqli_error($con));
      $nor=mysqli_affected_rows($con);
      if($flag==true)
      echo "Added. ";
      else
      echo "Not added";    
      closeConn($con);   

?>
</body>
</html>