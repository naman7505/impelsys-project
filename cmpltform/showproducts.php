<?php 

require_once ('dbfunctionprod.php');


$str="";
$errormsg1="";
$table="";
$table2="";
$recordexist="";
$con=connOpen();
$rs=getAllCat($con);
closeConn($con);
while($row=mysqli_fetch_array($rs))
{
	if(isset($_GET['cat']))
	{
	$cat=$_GET['cat'];
	
	if($cat==$row[0])	
		$str=$str."<option selected>$row[0]</option>";
	else
		$str=$str."<option>$row[0]</option>";
	}
else
	$str=$str."<option>$row[0]</option>";
}

if(isset($_GET['sub']) && isset($_GET['cat']))
{
	$cat=$_GET['cat'];
	
	if($cat!="Select")
	{
		$con=connOpen();
		$rs=getProdByCat($con, $cat);
		$recordexist=false;
		$table="<table border=1>";
		while($row=mysqli_fetch_array($rs))
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
		closeConn($con);

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

if(isset($_GET['addtocart']) || isset($_SESSION['cart']))
{
	$cart=array();
	if(isset($_SESSION['cart']))
		$cart=(Array)$_SESSION['cart'];

	$newarray=array();
	if(isset($_GET['addtocartcheckboxes']))
	{
		$nop=count($cart);
		$i=0;
		foreach($_GET['addtocartcheckboxes'] as $value)
		{
			$newarray[$i]=$value;
			$i=$i+1;

		}
	}
	$mergedcart=array_unique(array_merge($cart,$newarray), SORT_REGULAR);
	$_SESSION['cart']=$mergedcart;
	$table2="<table border=1>";
	$i=1;
	$con=connOpen();
	foreach($mergedcart as $value)
	{
			$table2=$table2."<tr>";
			$table2=$table2."<tc>".$i++."</td>";
			$table2=$table2."<td>".$value."</td>";
			$rs=fetchByProdid($value,$con);
			if($row=mysqli_fetch_array($rs))
			{
				$table2=$table2."<td>".$row[0]."</td>";
				$table2=$table2."<td>".$row[1]."</td>";
				$table2=$table2."<td>".$row[2]."</td>";
				$table2=$table2."<td>".$row[3]."</td>";
			}
			$table2=$table2."</tr>";
		}
		closeConn($con);
		$table2=$table2."</table>";

	}

?>


<html>
<body>
	<form method="get">
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
	if(isset($errormsg1))
		if($errormsg1!="")
			echo "<font color=red>$errormsg1</font>";
	if($table2!=="")
		echo $table2;
		?>

	</form>
</body>
</html>