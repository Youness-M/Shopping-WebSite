<?php

include ('conection.php');

$email=$_POST['email'];

$sql="select * from userdata where email='".$email."' ";
$stat=$db->prepare($sql);
$stat->execute();

$num=$stat->rowCount();

echo $num;
