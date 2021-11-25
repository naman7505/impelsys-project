<?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'root');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'testdb');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if(!$conn)
{
die("Server connection error");
}

$sql = "INSERT INTO emp (empno,ename,sal,deptno,job) VALUES ('1015','TOM',2000,10,'MANAGER')";
$nor = mysqli_query($conn, $sql);
if($nor>0)
echo "Added succ...";
else
echo "Not added. Some issue.";

// if (mysqli_affected_rows($rs) == 1)
// echo "Added succ...";
// else
// echo "Not added. Some issue.";

mysqli_close($conn);

?>


<html>
<body>
	<form>

		Empno<input type="text" size=10 name="empno"><br>
		Empname<input type="text" size=10 name="empno"><br>
		EmpSal<input type="text" size=10 name="empno"><br>
		Empno<input type="text" size=10 name="empno"><br>



	</form>
</body>
</html>