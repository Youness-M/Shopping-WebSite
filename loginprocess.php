<?php
session_start();


$emailaddr=$_POST['email'];
$emailaddr=addslashes($emailaddr);
$password=$_POST['password'];
$password=md5($password);

include ('conection.php');
$sql="select * from userdata where email='".$emailaddr."' and password='".$password."'";
$stat=$db->prepare($sql);
$stat->execute();
$res=$stat->fetch(PDO::FETCH_ASSOC);
$num=$stat->rowCount();

if($num==1){
    $_SESSION['email']=$res['email'];
    if (isset($_POST['remember'])){
        setcookie('remember',$res['email'],time()+60*60*24*7,'/');
    }
    header("location:userpanel.php");
}
else{
    header("location:loginPage.php?errorinlogin");
}

