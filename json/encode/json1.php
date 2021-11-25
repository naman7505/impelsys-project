<?php 
//Declare the array
$courses=array("Module-1"=>"HTML",1=>"JavaScript", "Module-3"=>"CSS3", "Module-4"=>"PHP");

//notify the browser about the type of file using header function
header('Content-type:text/javascript');

//Print the array in a simple JSON forma

echo json_encode($courses, JSON_PRETTY_PRINT);
$fp=fopen('result.json','w');
fwrite($fp, json_encode($courses, JSON_PRETTY_PRINT));
fclose($fp);
?>

