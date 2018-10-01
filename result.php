<?php
include ('myfirstclass.php');


$page=$_POST['page'];

$isexist=$_POST['isexist'];


if ($isexist==1){
    $forexisting='numberofproduct > 0 and';
}
else{$forexisting='';}


$minmount=$_POST['minmount'];
$maxmount=$_POST['maxmount'];

$order=$_POST['order'];
if ($order==1){$ordersql="order by id desc"; }
if ($order==2){$ordersql="order by numberofsel desc"; }
if ($order==3){$ordersql="order by numofseen desc"; }


$inputsearch=$_POST['keyword'];
$splitedkeyword=preg_split("/\s+/",$inputsearch);
$sort_result=array();


$sql="select * from newproducts_tbl where ".$forexisting." cost>=".$minmount." and cost<=".$maxmount." and title like '%".$inputsearch."%' ".$ordersql." ";
$object=new myfirstclass();
$result=$object->select($sql,array(),PDO::FETCH_NUM);
$productinpage=$_POST['numberinpage'];

foreach ($result as $res){

    array_push($sort_result,$res[0]);
}


foreach ($splitedkeyword as $splited){
    $sql="select * from newproducts_tbl where ".$forexisting." cost>=".$minmount." and cost<=".$maxmount." and title like '%".$splited."%' ".$ordersql." ";
    $splited_result=$object->select($sql,array(),PDO::FETCH_NUM);
    foreach ($splited_result as $newrecord){
        if(!in_array($newrecord[0],$sort_result)){ array_push($sort_result,$newrecord[0]);}

    }
}


$test=array();
foreach($sort_result as $row){

    $sql="select * from newproducts_tbl where id=".$row." ";
    $data_result=$object->select($sql,array(),PDO::FETCH_NUM);

    foreach ($data_result as $data){
        array_push($test,$data);
    }

}

//print_r($sql);
//echo $ordersql;
$numberofproduct=sizeof($sort_result);

$start=$productinpage*($page-1)+1;
$end=$page*$productinpage;
$i=1;
$m=1;
$array=array();

    foreach($test as $res){
        if($i>=$start && $i<=$end){
        array_push($array,$res);
    }
        $i=$i+1;

    }


$newarray=array($numberofproduct,$array);
echo json_encode($newarray);
