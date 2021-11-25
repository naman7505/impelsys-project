<?php 
$host='localhost';
$username='root';
$pass='root';
$db='testdb';

try{
    
    $connection=new PDO("mysql:host=$host;dbname=$db", $username, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $connection;


// function closeConn($connection)
// {
// 	$connection->close();
// }

function getAllCat($connection)
{
	$sql="Select distinct prod_cat from prod";
	$stmt=$connection->prepare($sql);
    $stmt->execute();
	return $stmt;
}

function getProdByCat($connection, $cat)
{
	$sql="Select * from prod where prod_cat=':cat'";
	$stmt=$connection->prepare($sql);
    $stmt->bindParam(':cat',$cat);
    $stmt->execute();
	return $stmt;
}

function fetchByProdid($connection, $prodid)

{
	$sql="SELECT * from prod where prod_id=:prodid";
	$stmt=$connection->prepare($sql);
    $stmt->bindParam(':prodid',$prodid);
    $stmt->execute();
	return $stmt;
	
	
}

}

catch(PDOException $error)
{
    echo "Connection not done";
}



?>

