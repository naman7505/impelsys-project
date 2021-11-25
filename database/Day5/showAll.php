
<?php
require_once('showDept.php');
?>
<html>
<head>
<script type="text/javascript">
function showDept()
{
	document.form1.submit();
}

</script>	
</head>
<body>
<form method="get" action="" name="form1">
<!-- Dept :<input type=text size=10 name="dept" 
value='
<?php 
if(isset($_GET['dept']))
   echo $_GET['dept'];
?>
'>
<input type="submit" name="submit" value="Show"> -->
<hr color=red>
Dept:
<select name="selectdept" onchange="showDept()">
<option>Select</option>
<?php
if(isset($options))
	echo $options;

?>
</select>
<input type="submit" name="showbydept" value="Show">
<table border=1>
<?php
if(isset($str))
{
	echo $str;

}
?>
</table>
<?php
if(isset($errormsg1))
if($errormsg1!="")
echo "<font color=red>$errormsg1</font>";


if(isset($str))
if($str!="")
{
echo "<br><input type='submit' name='edit' value='Edit'>";
echo " <input type='submit' name='totsal' value='Total Salary'>";
echo $_GLOBAL['totsal'];
echo "<input type='submit' name='adddcart' value='Add To Cart'> 
}


?>




</form>
</body>
</html>
