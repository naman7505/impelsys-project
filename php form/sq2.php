<?php
if(isset($_POST['sub2']))
{
    $fsname=$_POST['secq'];
    
    if($fsname=="SVN" )
        echo "<br>Password is impelsys";
    else
        echo "<font color=red>Your answer is wrong.</font>";
}
    ?>