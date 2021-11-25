<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'root');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'testdb');
$_GLOBAL['totsal']='';

function connOpen()
{
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
return $conn;
}
function fetchByDept($dept,$conn)
{
$sql = "SELECT job,empno,ename,sal  from emp where deptno=$dept";
//echo "<br>".$sql."<br>";		
$rs = mysqli_query($conn, $sql);
return $rs;
}
function updateSalByEmpno($empno,$newsal,$conn)
{
$sql = "update emp set sal=$newsal where empno=$empno";		
$nor = mysqli_query($conn, $sql);
return $nor;
}
function deleteByEmpno($empno,$conn)
{
$sql = "delete from emp where empno=$empno";		
$nor = mysqli_query($conn, $sql);
return $nor;
}
function getAllEmpno()
{
$sql = "SELECT empno  from emp";		
$rs = mysqli_query($conn, $sql);
return $rs;
}
function checkEmpnoContains($empno)
{
$sql = "SELECT count(*) into noe  from emp where empno=$empno";		
$rs = mysqli_query($conn, $sql);

if($row=mysqli_fetch_array($rs))
{
   $noe=$row['noe'];
   if($noe==1)
   	  return true;
   else
   	  return false;
}
return false;
}
function nextEmpid()
{
	$maxid=1001;
	$sql = "SELECT max($empno)+1 into newid  from emp";
    $rs = mysqli_query($conn, $sql);
    if($row=mysqli_fetch_array($rs))
    {
       $maxid=$row['newid'];
    }
    return $maxid;

}
function getAllDept($conn)
{
	$sql = "select distinct deptno from emp";
    $rs = mysqli_query($conn, $sql);
    return $rs;
} 

function getEmpNameSalByEmpno($empno,$conn)
{

$sql = "SELECT ename,sal  from emp where empno=$empno";
//echo "<br>".$sql."<br>";		
$rs = mysqli_query($conn, $sql);
return $rs;
}

function closeConn($conn)
{
  mysqli_close($conn);
}
?>