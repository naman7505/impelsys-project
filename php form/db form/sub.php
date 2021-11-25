<?php
$ms="";
if(isset($_GET['sub']) )
{
        $pwd=$_GET['pwd'];
        $cpwd=$_GET['cpwd'];
        if($pwd==$cpwd)
                header("location:signin.php");
        else
                echo "<br><font color=red>Please Enter the same password...</font>";
    
}
?>