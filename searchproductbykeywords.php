<?php
include ('myfirstclass.php');
$object=new myfirstclass();

$inputsearch='ماشین';

//$inputsearch=$_POST['keyword'];
$splitedkeyword=preg_split("/\s+/",$inputsearch);
$sort_result=array();

$sql="select * from newproducts_tbl where title like '%".$inputsearch."%' ";
$result=$object->select($sql,array(),PDO::FETCH_NUM);


foreach ($result as $res){

    array_push($sort_result,$res[0]);
}


foreach ($splitedkeyword as $splited){
    $sql="select * from newproducts_tbl where title like '%".$splited."%' ";
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



$number_data=array();
array_push($number_data,sizeof($test));
array_push($number_data,$test);

print_r($number_data);

//echo json_encode($number_data);