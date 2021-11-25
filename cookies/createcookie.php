
<?php

$loc="";
if(isset($_COOKIE['location']))
{
	$loc=$_COOKIE['location'];
}

if(isset($_GET['submit']))
{
  $loc=$_GET['city'];
  
  //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
  setcookie('location', $loc, time()-1, "/"); // 86400 = 1 day
 // echo "Saved in cookies";
}


?>


<html>

<body>
	<form method=get>
Enter your city :
<input type=text name="city" value="<?=$loc?>" size=20>
<input type="submit" name=submit value=submit>
</form>
</body>
</html>