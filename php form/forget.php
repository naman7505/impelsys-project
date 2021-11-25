<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "reg";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if(isset($_GET['sub1']))
{
    $email=$_GET['email'];

    $sql="SELECT * from emp where email='$email'";
    $rs=mysqli_query($sql, $conn);
    $x=mysqli_num_rows($rs);

    if($x>0 )
       header('location:Sq1.php');
    else
        echo "<br><font color=red>Please Enter the Valid Email ID</font>";
    mysqli_close($conn);
}


?>




<html>
<body align="center">
    <h1> Verify User ID</h1>
    <form name="security question" method="GET" action="">

    User Id:<input type="email" placeholder="enter mail id" name="email" required/><br><br>

    
    <input type="submit" name="sub1" value="Submit"/>

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
         Answer:<input type="text" size=30 name=""><br><br><br><br>

         <input type="button" name="sub" value="Submit"> -->



</form>
</body>
</html>