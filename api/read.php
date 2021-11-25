<?php

header('Content-Type:applicatioon/json');
header('Access-Control-Allow-Origin:*');
include "config.php";

$sql="Select * from employee";

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