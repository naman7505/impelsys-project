<?php 
$s1="";
$s2="";
session_start();
if(isset($_SESSION['name']) && isset($_SESSION['contact']))
{
	$s1=$s1.$_SESSION['name'];
    $s2=$s2.$_SESSION['contact'];

echo "<font color=purple size=10>Welcome ".$s1."!You have Successfully Loggedin.</font>";
echo "<br>Your Contact number is : ".$s2;
}

?>




<html>
<body align="middle" bgcolor="grey">
	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHMo2UGK18k92-UFd5-MyiQNuWv529bv-8YnSp31ZSsXFOiTToI8yQnJWGXs222k7KH3g&usqp=CAU" height="532px" width="1350px" >


</body>
</html>