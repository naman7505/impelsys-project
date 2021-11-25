<?php
$errmsg="";
$content="";
if(isset($_GET['submit']))
{
$email=$_GET['email'];
$conn = mysqli_connect('localhost', 'root', 'root', 'test321');

$sql = "select emailid,sq,sa from userdet where emailid='$email'";
echo $sql;
$rs = mysqli_query($conn, $sql);
$flag=false;
$sq="";
$sa="";

while($row=mysql_fetch_assoc($rs))
{
$flag=true;
$sq=row['sq'];
$sa=row['sa'];
}
mysqli_close($conn);

if($flag==true)
{
$content="<br><span> $sq</span><br>Answer:<input type='text' size='10' name='ans'>";
$content=$content."<input type=submit name='submit_ans' value='Submit'>";
}
else
{
$errmsg="<font color=red>Emaild is invalid";
}
}
?>
<html>
<body>
<form method="get">

Enter your email id:<input type="text" size=20 name="email"><br>
<input type=submit name="submit" value="Submit">

<?php
if($errmsg!="")
echo $errmsg;
if($content!="")
echo $content;
?>

</form>
</body>
</html>
