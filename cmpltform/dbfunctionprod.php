<?php 
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_USER','root');
DEFINE ('DB_PASSWORD','root');
DEFINE ('DB_NAME','testdb');
function connOpen()

{
	$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	return $conn;
}

function closeConn($conn)
{
	mysqli_close($conn);
}

function getAllCat($conn)
{
	$sql="Select distinct prod_cat from prod";
	$rs=mysqli_query($conn,$sql);
	return $rs;
}

function getProdByCat($conn, $cat)
{
	$sql="Select * from prod where prod_cat='$cat'";
	echo $sql;
	$rs=mysqli_query($conn,$sql);
	return $rs;
}

function fetchByProdid($prodid, $conn)

{
	$sql="SELECT * from prod where prod_id=$prodid";
	$rs=mysqli_query($conn,$sql);
	return $rs;
	
	
}

?>