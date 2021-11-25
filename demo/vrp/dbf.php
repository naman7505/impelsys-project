<?php
$errmsg="";
$content="";
$email="";
if(isset($_GET['submit']))
{
$email=$_GET['email'];
$conn = mysqli_connect('localhost', 'root', 'root', 'forgetpwd');

$sql = "select emailid,sq,sa  from userdet where emailid='$email'";
echo $sql;    
$rs = mysqli_query($conn, $sql);
$flag=false;
$sq="";
$sa=""; //

while($row=mysqli_fetch_assoc($rs)) 
 {
  $flag=true;
  $sq=$row['sq'];
  $sa=$row['sa']; // Session Variable
 }
 mysqli_close($conn);

 if($flag==true)
 {
   $content="<br><span> $sq</span><br>Answer:<input type='text' size='10' name='ans'>";
   $content=$content."<input type=submit name='submit_ans' value='Submit'>";
 }
 else
 {
   $errmsg="<font color=red>Emaild  is invalid";
 }
}

if(isset($_GET['submit_ans']))
{
$givenans=trim($_GET['ans']);
$email=trim($_GET['email']);
$conn = mysqli_connect('localhost', 'root', 'root', 'forgetpwd');
$sql = "select sa from userdet where emailid='$email'";
//echo $sql;    
$rs = mysqli_query($conn, $sql);
$sa=""; //

while($row=mysqli_fetch_assoc($rs)) 
 {

  $sa=$row['sa']; 
  echo $sa;
 }
 echo $givenans.":".$sa;
 mysqli_close($conn);
   if(trim($givenans)==trim($sa))
     header('location:resetpwd.php');
    else
      $errmsg="Answer is not correct.";
}
?>
<html>
<body>
  <form method="get">

  Enter your email id:<input type="text" size=20 name="email" value='<?=$email?>'><br>
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