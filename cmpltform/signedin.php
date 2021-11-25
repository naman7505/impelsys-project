<?php 
$s="";
session_start();
if(isset($_SESSION['uname']))
{
	$s=$s.$_SESSION['uname'];

echo "<font color=purple size=10>Welcome ".$s."!You have Successfully Loggedin.</font>";
}

?>




<html>
<body align="middle" bgcolor="grey">
	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHMo2UGK18k92-UFd5-MyiQNuWv529bv-8YnSp31ZSsXFOiTToI8yQnJWGXs222k7KH3g&usqp=CAU" height="532px" width="1350px" >


</body>
</html>