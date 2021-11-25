

<html>
<body align="center" >
<h1 color=red>Registration Form</h1>

<form name="registration" method="POST" action="">

User Id:<input type="email" placeholder="Enter mail id" name="uid" required>
<br><br><br>


Name:<input type="text" size=50 alt="name" name="Name"/><br><br><br>

Contact:<input type="int" size=50 alt="number" name="mo"/><br><br><br>

Address:<input type="text" size=50 alt="add" name="address"/><br><br><br>

Password:<input type="password" size=50 name="pwd" required/><br><br><br>
Confirm Password:<input type="password" size=50 name="cpwd" required/><br><br><br>

Gender:<input type="radio" name="gender" value="m">Male &nbsp;&nbsp;<input type="radio" name="gender" value="f">Female&nbsp;&nbsp;<input type="radio" name="gender" value="o">Other<br><br><br>

Category:<select name="category">
         <option value="select">Select</option>
         <option value="general">General</option>
         <option value="obc">OBC</option>
         <option value="sc/st">SC/ST</option>
         </select><br><br><br>

Qualification:<input type="checkbox" name="qual" value="btech">B.Tech &nbsp;&nbsp;<input type="checkbox" name="qual" value="mtech">M.Tech &nbsp;&nbsp;<input type="checkbox" name="qual" value="bca">B.C.A. &nbsp;&nbsp;<input type="checkbox" name="qual" value="mca">M.C.A.<br><br><br>

<input type="SUBMIT" name="sub" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" name="res" value="Reset">



<?php
require 'sub.php';

?>



</form>
</body>
</html>




