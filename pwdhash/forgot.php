<?php
$err="";
$content="";
$userid="";
require_once('function.php');
if(isset($_GET['submit'])){
	$userid=trim($_GET['mail']);
	$_SESSION['uid']=$userid;
	$con=connOpen();
	$sql="select userid,question,answer from login where userid='$userid'";
	//echo $sql;
	$rs=mysqli_query($con,$sql);
	$flag=false;
	$ques="";
	$ans=""; // session variable
	while($row=mysqli_fetch_assoc($rs)){
		$flag=true;
		$ques=$row['question'];
		$ans=$row['answer'];
	}
	closeConn($con);
	if($flag==true)
	{
		$content="<br><span> $ques </span><br>Answer: <input type='text' name='ans'>";
		$content=$content."<input type=submit name='submit_ans' value='Submit'>";

		


	}
	else{
		$err="Invalid userid";
	}

}
if(isset($_GET['submit_ans']))
{
	$inputans=$_GET['ans'];
	$userid=trim($_GET['mail']);
	$con=connOpen();
	$sql="select answer from login where userid='$userid'";
	$rs=mysqli_query($con,$sql);
	$ans=""; 
	while($row=mysqli_fetch_assoc($rs)){
		$ans=$row['answer'];
	}
	//echo $inputans.":".$ans;
	closeConn($con);
	if(trim($inputans)==trim($ans))
	{
		
        $query_string = 'email=' . urlencode($userid);
        //echo '<a href="mycgi?' . htmlentities($query_string) . '">';

		header('location:resetpass.php?'.$query_string);

	}
	else{
		$err="Answer isn't correct";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FORGOT PASSWORD</title>
</head>
<body>
<form method="GET">
	Enter your mail ID: <input type="text" name="mail" value="<?=$userid?>"><br>
	<input type="submit" name="submit" value="Submit">
	<?php
	if($err!=""){
		echo $err;
	}
	if($content!=""){
		echo $content;
	}
	?>
</form>
</body>
</html>
<?php
?>