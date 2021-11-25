
<?php
$location='';
if(!isset($_COOKIE['location'])) 
{
    echo "Cookie  is not set!";
} else 
{
    $location=$_COOKIE['location'];
   echo "Cookie set . Value is:"  ;
}
?>

<html>

<body>
	<form method=get>
Enter your city :
<input type=text name="city" value="<?=$location?>" size=20>
<input type="submit" name=submit value=submit>
</form>
</body>
</html>
