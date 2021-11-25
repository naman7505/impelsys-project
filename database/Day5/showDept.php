<?php
session_start();
require_once('dbFunctions.php');
$str="";

//$deptno="";
if (isset($_GET['selectdept']))
{
	$deptno=$_GET['selectdept'];
	$con=connOpen();
	$rs=fetchByDept($deptno,$con);
	
	
	$str="";
    

	while($row=mysqli_fetch_array($rs))
	{
		$str=$str."<tr>";
		$str=$str."<td>".$row[0]."</td>";
		$str=$str."<td>".$row[1]."</td>";
		$str=$str."<td>".$row[2]."</td>";
		$str=$str."<td>".$row[3]."</td>";
		$str=$str."<td><input type='checkbox' name='salcheckboxes[]' value='$row[3]'></td>";
		$str=$str."<td><input type='radio' name='showdet' value='$row[1]'></td>";
		$str=$str."<td><a href=''>More...</td>";
		$str=$str."<td> <input type='chechbox' name='addtocartchkbox[]' value='$row[1]'></td>";
		$str=$str."</tr>";
		$recordexist=true;

	}

	closeConn($con);

}

$errormsg1="";
if(isset($_GET['edit']))
{
	if(isset($_GET['showdet']))
	{
		$errormsg1=="";


		//$path=$_SERVER["DOCUMENT_ROOT"]."<br>";
		$s="?empno=".$_GET['showdet'];
		echo $s;

	    header("location:editemp.php".$s);
      
	}
	else
		$errormsg1="Please select one employee.";
}

$x=0;
if(isset($_GET['salcheckboxes']))
{
	foreach ( $_GET['salcheckboxes'] as $value )
	 {
	 	//echo $value;
        $x=$x+(int)$value;
     
      }
      $_GLOBAL['totsal']=$x;
}



// if(isset($_GET['showbydept']))
// {
//    $deptno=$_GET['dept']; 

// }

$con=connOpen();
$rs=getAllDept($con);
closeConn($con);
$options="";

$sd="";
if(isset($_GET['selectdept']))
    $sd=$_GET['selectdept']; //10, 20.30

while($row=mysqli_fetch_array($rs))
	{
      if($sd==$row[0])
         $options=$options."<option selected>$row[0]</option>";
     else
     	$options=$options."<option >$row[0]</option>";
	}

?>

<?php

$cart=array();
if(!isset($_SESSION['cart']))
{
 $_SESSION['cart']=$cart;
}
else
$cart=(Array)$_SESSION['cart'];


if(isset($_GET['addcart']))
{
	if(isset($_GET['addtocartchkbox']))
	{
		$noe=count($cart);
		foreach($_GET['addtocartchkbox'] as $value)
		{
			$cart[$noe]=$value;
			$noe=$noe+1;
		}
$_session['cart']=$cart;
print_r($cart);
		}
	}
}