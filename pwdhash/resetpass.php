
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Reset Your Password</title>
</head>
<body>
<form>
  <?php
  $err="";
  //session_start();
   ?>
  Email ID: <input type="text" name ="mail" readonly value="<?php
  if(isset($_GET['email']))
  echo $_GET['email']; ?>
  "><br>
  New Password: <input type="password" name="newpass"><br>
  Confirm Password: <input type="password" name="conpass"><?php echo($err); ?>
  <br>
  <input type="submit" name="submit" value="Update Your Password">
  &nbsp;&nbsp;
  <input type="reset" name="reset" value="Reset">

</form>
<?php
require_once('function.php');
if(isset($_GET['submit'])){
    $con=connOpen();
    $conp=$_GET['conpass'];
    $newp=$_GET['newpass'];
    $userid=trim($_GET['mail']);
    if($newp==$conp)
    {
      $sql="update login SET password = '$conp' WHERE userid = '$userid'";
      
      echo $sql."<br>";
      $rs=mysqli_query($con,$sql);// or die(mysqli_error($con));
      $nor=mysqli_affected_rows($con);
      if($rs==true){
      echo "$nor row effected. Your password has been resetted successfully. Please "."<a href=login.php>Login</a>";
    }
    else{
      echo "Couldn't reset: ".mysqli_error($con);
    }
    }
    else{
      $err="<span>*Please enter same values in both the fields</span>";
    }
    closeConn($con);
  }
  
  
?>
</body>
</html>