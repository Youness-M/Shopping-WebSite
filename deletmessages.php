<?php

$id=$_GET['id'];
$pagenumber=$_GET['pagenumber'];
echo $pagenumber;

include ('conection.php');
$sql="delete from messagestbl where id='$id'";
$stat=$db->prepare($sql);
$stat->execute();

header("location:userpanel.php?ithem=messages&pagenumber=$pagenumber");