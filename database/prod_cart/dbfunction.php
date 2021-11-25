<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'root');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'testdb');
$_GLOBAL['totpay']='';

function connOpen()
{
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
return $conn;
}
function fetchByCat($cat,$conn)
{
$sql = "SELECT prod_id,prod_name,prod_descr,prod_price  from prod where prod_cat='$cat'";
//echo "<br>".$sql."<br>";		
$rs = mysqli_query($conn, $sql);
return $rs;
}
function updatePriceByProdid($prodid,$newprice,$conn)
{
$sql = "update prod set prod_price=$newprice where prod_id='$prodid'";		
$nor = mysqli_query($conn, $sql);
return $nor;
}
function deleteByProdid($prodid,$conn)
{
$sql = "delete from prod where prod_id='$prodid'";		
$nor = mysqli_query($conn, $sql);
return $nor;
}
function getAllProdid()
{
$sql = "SELECT prod_id  from prod";		
$rs = mysqli_query($conn, $sql);
return $rs;
}
function checkProdidContains($prodid)
{
$sql = "SELECT count(*) into nop  from prod where prod_id='$prodid'";		
$rs = mysqli_query($conn, $sql);

if($row=mysqli_fetch_array($rs))
{
   $nop=$row['nop'];
   if($nop==1)
   	  return true;
   else
   	  return false;
}
return false;
}
function nextProdid()
{
	$maxid=1001;
	$sql = "SELECT max($prodid)+1 into newid  from prod";
    $rs = mysqli_query($conn, $sql);
    if($row=mysqli_fetch_array($rs))
    {
       $maxid=$row['newid'];
    }
    return $maxid;

}
function getAllCat($conn)
{
	$sql = "select distinct prod_cat from prod";
    $rs = mysqli_query($conn, $sql);
    return $rs;
} 

function getProdNamePriceByProdid($empno,$conn)
{

$sql = "SELECT prod_name,prod_price  from prod where prod_id='$prodid'";
//echo "<br>".$sql."<br>";		
$rs = mysqli_query($conn, $sql);
return $rs;
}

function closeConn($conn)
{
  mysqli_close($conn);
}

function fetchByProdid($pid,$conn)
{
$sql = "SELECT prod_price,prod_descr,prod_name  from emp where prod_id='$pid'";
//echo "<br>".$sql."<br>";		
$rs = mysqli_query($conn, $sql);
return $rs;
}
?>