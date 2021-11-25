<?php
$ms="";
if(isset($_POST['sub']) )
{
        $pwd=$_POST['pwd'];
        $cpwd=$_POST['cpwd'];
        if($pwd==$cpwd)
                header("location:next.php");
        else
                echo "Please Enter the same password";
    
}
?>