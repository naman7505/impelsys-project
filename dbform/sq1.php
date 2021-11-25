<?php

$servername='localhost';
$username='root';
$password='root';
$dbname='reg';

$conn=mysqli_connect($servername,$username,$password,$dbname);

$email="";
if(isset($_GET['sub2']))
{
    $email=$_GET['email'];
    $lname=$_GET['secq'];



    $sql="SELECT pwd from emp where email='$email' and lname='$lname'";

    $flag="";
    $no=mysqli_query($conn, $sql);

    if($row=mysqli_fetch_array($no))
    {
        $flag=$flag.$row[0];
    }
    
    
    if(strlen($flag)>0)
        echo "Your Password is:".$flag;
    else
        echo "Enter the valid User Id and Answer";


    mysqli_close($conn);
}
?>



<html>
<body align="center">
    <h1> Security Question</h1>
    <form name="security question" method="GET" action="">

    User Id:<input type="email" placeholder="enter mail id" name="<?=email?>" required/><br>


    What is your Last Name:<input type="text"  value="" name="secq"/><br><br>
    
    <input type="submit" name="sub2" value="Submit"/>

    
	<!--Security Question 1:<select name="sq1">
           <option value="select">Select</option>
        <option value="fschool" >What is your first school name?</option>
         <option value="fcolor" >What is your Favourite Color?</option>
         <option value="sname" >What is your surname?</option>
         </select><br><br>
         Answer:<input type="text" size=30 name=""><br><br><br><br>

         Security Question 2:<select name="sq2">
         <option value="select">Select</option>
         <option value="fschool" >What is your first school name?</option>
         <option value="fcolor" >What is your Favourite Color?</option>
         <option value="sname" >What is your surname?</option>
         </select><br><br>
         Answer:<input type="text" size=30 name=""><br><br><br><br>


         Security Question 3:<select name="sq3">
         <option value="select">Select</option>
         <option value="fschool" >What is your first school name?</option>
         <option value="fcolor" >What is your Favourite Color?</option>
         <option value="sname" >What is your surname?</option>
         </select><br><br>
         Answer:<input type="text" size=30 name=""><br><br><br><br>*/

         <input type="button" name="sub" value="Submit"> -->



</form>
</body>
</html>