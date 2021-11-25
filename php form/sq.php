<?php
if(isset($_POST['sub1']))
{
    $uid=$_POST['uid'];

    if($uid=="abc@gmail.com" )
       header('location:Sq1.php');
    else
        echo "<br><font color=red>Please Enter the Valid Email ID</font>";
}
    ?>
