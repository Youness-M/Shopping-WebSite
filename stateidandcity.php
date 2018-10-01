<?php
include ('conection.php');

$stateid=$_POST['idstate'];
$sql="select * from citysname where statesid=".$stateid." ";
$stat=$db->prepare($sql);
$stat->execute();

echo'<option selected value="0">شهر مورد نطر را انتخاب کنید</option>';
while($res=$stat->fetch(PDO::FETCH_ASSOC)){

    $id=$res['id'];
    $cityname=$res['cityname'];

    echo' <option value="'.$id.'">'.$cityname.'</option>';
}