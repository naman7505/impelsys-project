<?php

header('Content-Type:applicatioon/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST');

$data=json_encode(file_get_contents("php://input"),true);
$empid=$data['eid'];
$empname=$data["ename"];
$empemail=$data["eemail"];
$empage=$data["eage"];
$empdesig=$data["edesig"];
$empcreated=$data["ecreated"];


include "config.php";

$data=

$sql="Update employee SET emp_name='{$empname}', emp_email='{$empemail}',emp_age={$empage},emp_desigamtion='{$empdesig}',created='{$empcreated}' where emp_id={$empid}";

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