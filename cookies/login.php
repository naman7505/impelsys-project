<?php 
$userid="";
$pwd="";

if(isset($_COOKIE['uname']) && isset($_COOKIE['pwd']))
{
    $userid=$_COOKIE['uname'];
    $pwd=$_COOKIE['pwd'];
}


    

if(!empty($_GET['chkbox']))
{
    $userid=$_GET['uid'];
    setcookie('uname',$userid,time()+60*2,"/");

    $pwd=$_GET['pwd'];
    setcookie('pwd',$pwd,time()+60*2,"/");
    echo "Your Password is saved";
}
else {
           setcookie("email","");
           setcookie("pwd","");
          echo "Cookies Not Set";
  }


?>





<html>
    <body align=center>
        <h1>Login Page</h1>
        <form method="GET" action="welcome.php">

        User name:<input type='text' name='uid' value='<?=$userid?>'><br><br>

        Password:<input type='password' name='pwd' value='<?=$pwd?>'><br>

        Save Password:<input type='checkbox' name='chkbox'><br><br>

        <input type='submit' name='sub' value='Submit'>

</form>
</body>
</html>
