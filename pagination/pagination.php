<!DOCTYPE html>
<html>

<?php 
$str="";

require_once('connection.php');

$pages=2;
if(!isset($_GET['flag']))
{
	$flag=1;
}
else
{
	$flag=$_GET['flag'];
}

if($flag!=1)
{
	$prev=$flag-1;
	echo "<a href='pagination.php?flag=$prev'>Previous</a>";

}

$from=($flag-1)*$pages;
$sql="select * from emp";
$rs=mysqli_query($conn, $sql);
$rows=mysqli_num_rows($rs);
$nop=ceil($rows/$pages);

$sql1="select * from emp Limit ".$from.",".$pages;
$rs1=mysqli_query($conn, $sql1);
$str="<table border=1>";
	
while($row=mysqli_fetch_array($rs1))
{
	$str=$str."<tr>";
	$str=$str."<td>".$row[0]."</td>";
	$str=$str."<td>".$row[1]."</td>";
	$str=$str."<td>".$row[2]."</td>";
	$str=$str."</tr>";
}
echo $str;
$imp;
for($i=1;$i<$nop;$i++)
{
	$imp=$i+1;
	echo "<a href='pagination.php?flag=$i'>$i</a>";
}

if($flag!=$nop)
{
	$next=$flag+1;
	echo "<a href='pagination.php?flag=$next'>Next</a>";
}

?>
<head>
	<title>pagination</title>
</head>
<body>
</body>
</html>
