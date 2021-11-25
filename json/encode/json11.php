<?php 

//declare the array
$courses=array("HTML","CSS","Python","PHP");

//notify the broeser about the type of file using header function

header('Content-type: text/javascript');


//Print the array in a simple json format
echo json_encode($courses, JSON_PRETTY_PRINT);


echo json_encode($courses, JSON_FORCE_OBJECT);
$fp=fopen('result1.json','w');
fwrite($fp, json_encode($courses,JSON_PRETTY_PRINT));
fclose($fp);

?>