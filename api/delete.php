<?php

header('Content-Type:applicatioon/json');
header('Access-Control-Allow-Origin:*');

$data=json_encode(file_get_contents("php://input"),true);

$emp_id=$data["eid"];

include "config.php";

$data=

$sql="Delete * from employee where id={$emp_id}";

$result=mysqli_query($conn,$sql);

if($result=true){

    echo json_encode(array('message'=>'Record Deleted'));
}
else
{
    echo json_encode(array('message'=>'No Record Found' , 'status'=>false));
}





?>