
<?php
require_once('showCat.php');
?>
<html>
<head>
<!-- <script type="text/javascript">
// function showDept()
// {
// 	document.form1.submit();
// }

</script>	 -->
</head>
<body>
<form method="get" action="" name="form1">
<!-- Dept :<input type=text size=10 name="dept" 
value='
<?php 
if(isset($_GET['cat']))
   echo $_GET['cat'];
?>
'>
<input type="submit" name="submit" value="Show"> -->
<hr color=red>
<p align="right"><a href="logout.php">Logout</a></p>
Product Category:
<select name="selectcat" onchange="showCat()">
<option>Select</option>
<?php
if(isset($options))
	echo $options;

?>
</select>
<input type="submit" name="show" value="Show">
<table border=1>
<?php
if($str1!=="")
{
	echo $str1;

}
?>
</table>
<?php
if(isset($errormsg1))
	if($errormsg1!="")
		echo "<font color=red>$errormsg1</font>";
if($str2!=="")
   echo $str2;

?>








</form>
</body>
</html>
