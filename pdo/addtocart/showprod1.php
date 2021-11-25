<?php 

$host='localhost';
$username='root';
$pass='root';
$db='testdb';

try{
    
    $connection=new PDO("mysql:host=$host;dbname=$db", $username, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $str="";
    $errormsg1="";
    $table="";
    // $table2="";
    $recordexist="";

    $sql="Select distinct prod_cat from prod";
	$stmt=$connection->prepare($sql);
    $stmt->execute();
    while($row=$stmt->fetchAll())
    {
	    if(isset($_POST['cat']))
	    {
	        $cat=$_POST['cat'];
	
	        if($cat==$row[0])	
		        $str=$str."<option selected>$row[0]</option>";
	        else
		        $str=$str."<option>$row[0]</option>";
	    }
        else
	        $str=$str."<option>$row[0]</option>";
    }

    if(isset($_POST['sub']) && isset($_POST['cat']))
    {
	    $cat=$_POST['cat'];
	
	    if($cat!="Select")
	    {
            $sql="Select * from prod where prod_cat=':cat'";
            $stmt=$connection->prepare($sql);
            $stmt->bindParam(':cat',$cat);
            $stmt->execute();
		    $recordexist=false;
		    $table="<table border=1>";
		    while($row=$stmt->fetchAll())
		    {
			    $table=$table. "<tr>

								<td>$row[0]</td>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[3]</td>

								<td><input type='checkbox' name='addtocartcheckboxes[]' value='$row[0]'></td>

							</tr>";
			    $recorexist=true;
		    }

		    $table=$table."</table>";
		    $table=$table."<input type='submit' name='addtocart' value='Add To Cart'>";

	    }
	    else
	    {
		    echo "<font color=red>Please Select Product Category</font>";
	    }
    }

// if($recordexist==true)
// {
// 	$table=$table."<input type='submit' name='addtocart' value='Add To Cart'>";
//     echo $table;
// }
// echo $table;

    // if(isset($_POST['addtocart']) || isset($_SESSION['cart']))
    // {
	//     $cart=array();
	//     if(isset($_SESSION['cart']))
	// 	    $cart=(Array)$_SESSION['cart'];

	//     $newarray=array();
	//     if(isset($_GET['addtocartcheckboxes']))
	//     {
	// 	    $nop=count($cart);
	// 	    $i=0;
	// 	    foreach($_GET['addtocartcheckboxes'] as $value)
	// 	    {
	// 		    $newarray[$i]=$value;
	// 		    $i=$i+1;

	// 	    }
	//     }
	//     $mergedcart=array_unique(array_merge($cart,$newarray), SORT_REGULAR);
	//     $_SESSION['cart']=$mergedcart;
	//     $table2="<table border=1>";
	//     $i=1;
	//     foreach($mergedcart as $value)
	//     {
	// 		$table2=$table2."<tr>";
	// 		$table2=$table2."<tc>".$i++."</td>";
	// 		$table2=$table2."<td>".$value."</td>";
	// 		$rs=fetchByProdid($value,$con);
	// 		if($row=mysqli_fetch_array($rs))
	// 		{
	// 			$table2=$table2."<td>".$row[0]."</td>";
	// 			$table2=$table2."<td>".$row[1]."</td>";
	// 			$table2=$table2."<td>".$row[2]."</td>";
	// 			$table2=$table2."<td>".$row[3]."</td>";
	// 		}
	// 		$table2=$table2."</tr>";
	// 	}
		
	// 	$table2=$table2."</table>";

	// }
}

catch(PDOException $error){
    echo "Connection not done";
}

?>


<html>
<body>
	<form method="POST">
	Product Category:<select name="cat">
	<option>Select</option>
	<?php echo $str; ?>
	</select>

	<input type="submit" name="sub" value="Submit"><br><br>
	<?php
	if(isset($table))
	{
		if(!$table=="")
			
		echo $table;
	}
	else
		$errmsg="Table is not showing";
	?>

	<?php 
	// if(isset($errormsg1))
	// 	if($errormsg1!="")
	// 		echo "<font color=red>$errormsg1</font>";
	// if($table2!=="")
	// 	echo $table2;
		?>

	</form>
</body>
</html>