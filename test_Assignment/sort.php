<html>
<body>

<h1> Sorting the name by descending order</h1>

<?php 
$name=array("Mr. Ayush Kesarwani","Mr. Pratyush Joshi","Mr. Sanjeev","Mr. Sanjeev Shukla");

rsort($name);

$non=count($name);

for($i=0;$i<$non;$i++){
    echo $name[$i]."<br>";

}

?>

</body>
</html>

