<?php
session_start();
require_once('dbFunction.php');
$str1="";
$str="";
$str2="";
$errormsg1="";
$x=0;
$options="";
$sd="";
$_GLOBAL['gtotal']="";
$recordexist=false;
if(isset($_GET['selectcat']))
    $sd=$_GET['selectcat'];
$con=connOpen();
$rs=getAllCat($con);
closeConn($con);
while($row=mysqli_fetch_array($rs))
{
	if($sd==$row[0])
		$options=$options."<option selected>$row[0]</option>";
	else
	$options=$options."<option >$row[0]</option>";
}

if(isset($_GET['totpay']))
 {
	if(isset($_GET['pricecheckboxes']))
	{
		foreach ( $_GET['pricecheckboxes'] as $value )
		{
			$x=$x+(int)$value;     
		}
		$_GLOBAL['gtotal']=$x;
	}
}

if(isset($_GET['show']) || isset($_GET['selectcat']))
{
	if (isset($_GET['selectcat']) )
	{
	$deptno=$_GET['selectcat'];
	$con=connOpen();
	$rs=fetchByCat($prod_name,$con);
	$recordexist=false;
	$str1="<table border=1>";

	 
	while($row=mysqli_fetch_array($rs))
	{
		$str1=$str1."<tr>";
		$str1=$str1."<td>".$row[0]."</td>";
		$str1=$str1."<td>".$row[1]."</td>";
		$str1=$str1."<td>".$row[2]."</td>";
		$str1=$str1."<td>".$row[3]."</td>";
		$str1=$str1."<td><input type='checkbox' name='pricecheckboxes[]' value='$row[3]'></td>";
		$str1=$str1."<td><input type='radio' name='showdet' value='$row[1]'></td>";
		$str1=$str1."<td><a href=''>More...</td>";
		$str1=$str1."<td><input type=checkbox name='addtocartchkbox[]' value='$row[1]'></td>";
		$str1=$str1."</tr>";
		$recordexist=true;
	}
	$str1=$str1."</table>";
	closeConn($con);
	}
}

if($recordexist==true)
	{
	$str1=$str1. "<br><input type='submit' name='edit' value='Edit'>";
	$str1=$str1. " <input type='submit' name='totpay' value='Total Pament'>";
	$str1=$str1. $_GLOBAL['gtotal'];
	$str1=$str1. " <input type='submit' name='addcart' value='Add to Cart'>";
	}


if(isset($_GET['edit']))
{
	if(isset($_GET['showdet']))
	{
		$errormsg1=="";
		$s="?prod_id=".$_GET['showdet'];
		header("location:editemp.php".$s);      
	}
	else
		$errormsg1="Please select one product.";
}


// Add To Cart

if(isset($_GET['addcart']) || isset($_SESSION['cart']))
	{
		$cart=array();
		if(isset($_SESSION['cart']))
			$cart=(Array)$_SESSION['cart'];	
				
		$newarray=array();
		if(isset($_GET['addtocartchkbox']))
		{
			$noe=count($cart);
			$i=0;
			foreach ( $_GET['addtocartchkbox'] as $value )
			{			
				$newarray[$i]=$value;
				$i=$i+1;			
			}
		}
		$mergedcart=array_unique(array_merge($cart,$newarray), SORT_REGULAR);
		$_SESSION['cart']=$mergedcart;
		$str2="<table border=1>";
		$i=1;
		$con=connOpen();
		foreach($mergedcart as $value)
		{
				$str2=$str2."<tr>";
				$str2=$str2."<td>".$i++."</td>";
				$str2=$str2."<td>".$value."</td>";
				$rs=fetchByEmpno($value,$con);
				if($row=mysqli_fetch_array($rs))
				{
					$str2=$str2."<td>".$row[2]."</td>";
					$str2=$str2."<td>".$row[0]."</td>";
					$str2=$str2."<td>".$row[1]."</td>";
				}
				$str2=$str2."</tr>";
		}
		closeConn($con);
		$str2=$str2."</table>";
}
?>


