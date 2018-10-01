<?php

include ('conection.php');

$phone=$_POST['phone'];

$sql="select * from userdata where phonenumber='".$phone."' ";
$stat=$db->prepare($sql);
$stat->execute();

$num=$stat->rowCount();

echo $num;
