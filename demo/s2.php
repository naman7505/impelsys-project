<?php
$msg="";

if(isset($_POST['uid']) && isset($_request['pwd']))
{
$name=$_POST['uid'];
$pwd=$_POST['pwd'];
echo "<br>Name: $name Pwd: $pwd ";
if($name=="php" && $pwd=="impelsys")
header('location: next.php');
else
$msg="<font color=red>User ID or pwd is Invalid</font>";
}

?>

<html>
<body>
<form name="login" method="post" action="">

User ID: <input type="text" size=10 name="uid" alt="name here"><br>
Password: <input type="password" size=10 name="pwd"><br>
<input type="submit" name="sublogin" value="Sign In"><br>
<a href="forgot.php">Forgot password ?</a>&nbsp;&nbsp;
<a href="reg.php">Sign Up </a>
<br>
<?php
echo $msg;

?>

</form>
</body>
</html>