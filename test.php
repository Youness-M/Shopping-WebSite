<?php
include ('myfirstclass.php');


$isexist=1;

if ($isexist==1){
    $forexisting='numberofproduct >0 and';
}
else{$forexisting='';}

$minmount=1000;
$maxmount=1000000;

$sql="select * from newproducts_tbl where ".$forexisting." cost>=".$minmount." and cost<=".$maxmount."  order by id desc";
echo $sql;
$object=new myfirstclass();
$result=$object->select($sql,array(),PDO::FETCH_NUM);
print_r($result);