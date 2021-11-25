
<?php
require_once('dbfunctions.php');

$empno="";
$name="";
$sal="";
if(isset($_GET['empno']))
{

   $empno=$_GET['empno'];
   $con=connOpen();
   $rs=getEmpNameSalByEmpno($empno,$con);
   closeConn($con);
   if($row=mysqli_fetch_array($rs))
   {
   	$name=$row[0];
   	$sal=$row[1];
   }
}

?>



<html>
<body>
<form>

Empno<input type=text  value="<?=$empno?>" name="eempno" readonly="readonly"><br>
Emp Name<input type=text  value="<?=$name?>" name="eename" ><br>
Salary<input type=text  value="<?=$sal?>" name="eesal"><br>
<input type="submit" name="update" value="Update">
<input type="submit" name="update" value="Cancel">



</form>
	</body>
	</html>