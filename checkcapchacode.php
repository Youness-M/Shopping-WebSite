<?php

session_start();
$capchacode=$_POST['capchacode'];

if ($capchacode==$_SESSION['capcha']){

    echo '1';
}else{
    echo'0';
}
?>