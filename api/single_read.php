<?php

header('Content-Type:applicatioon/json');
header('Access-Control-Allow-Origin:*');

$data=json_encode(file_get_contents("php://input"),true);

$emp_id=$data["eid"];

include "config.php";

$data=

$sql="Select * from employee where id={$emp_id}";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

    $res=mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($res);
}
else
{
    echo json_encode(array('message'=>'No Record Found' , 'status'=>false));
}





?>