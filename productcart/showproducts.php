<?php 

require_once ('dbfunction.php');


$str="";
$errmsg="";
$table="";
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
		$table2="<tr>
                				&nbsp;&nbsp;
                				<th>Id</th>
                					 &nbsp;&nbsp;&nbsp;&nbsp;
                				<th>Name</th>
                					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                				<th>Description</th>
                					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                				<th>Price</th>

                			</tr>";

		while($row=mysqli_fetch_array($rs))
		{
			$table=$table. "<tr>

								<td>$row[0]</td>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td>$row[3]</td>
								
								<td><select name='noi[]'
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								</select>
								</td>
								<td><input type='checkbox' name='pricecheckboxes[]' value='$row[3]'></td>
								<td><input type='checkbox' name='addtocartcheckboxes[]' value='$row[1]'></td>

							</tr>";
			$recorexist=true;
		}

		$table=$table."</table>";
		closeConn($con);

	}
	else
	{
		echo "<font color=red>Please Select Product Category</font>";
	}
}

if($recordexist==true)
{
	$table=$table."<input type='submit' name='totpay' value='Total Cost'>";
	$table=$table."<input type='submit' name='addtocart' value='Add To Cart'>";

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
		echo $table2;	
		echo $table;
	}
	else
		$errmsg="Table is not showing";
	?>

	<?php echo $errmsg; ?>
	</form>
</body>
</html>