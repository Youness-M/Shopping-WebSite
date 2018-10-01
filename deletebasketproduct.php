<?php

$id=$_POST['productid'];

include ('conection.php');
$sql="delete from basketcooki where productid=".$id." and cookiname='".$_COOKIE['mybasket']."' ";
echo $sql;

$stmt=$db->prepare($sql);
$stmt->execute();


?>