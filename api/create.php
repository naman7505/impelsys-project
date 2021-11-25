<?php

header('Content-Type:applicatioon/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST');

$data=json_encode(file_get_contents("php://input"),true);

$empname=$data["ename"];
$empemail=$data["eemail"];
$empage=$data["eage"];
$empdesig=$data["edesig"];
$empcreated=$data["ecreated"];


include "config.php";

$data=

$sql="insert into employee values ('{$empname}','{$empemail}',{$empage},'{$empdesig}','{$empcreated}')";

$result=mysqli_query($conn,$sql);

if($result=true){

    //echo("Record created successfully!");
    echo json_encode(array('message'=>'Record Created Successfully' , 'status'=>true));

}
else
{
    echo json_encode(array('message'=>'Record Not Created' , 'status'=>false));
}





?>