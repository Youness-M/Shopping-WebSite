<?php
session_start();
include ('sqlinjectioncheck.php');
include ('jdf.php');




if (isset($_POST['capchacode'])){

    if($_POST['capchacode']==$_SESSION['capcha']){


        $email=$_POST['email'];
        $email=sqlinjectioncheck($email);


        $phonenumber=$_POST['phonenumber'];
        $phonenumber=sqlinjectioncheck($phonenumber);


        $username=$_POST['username'];
        $username=sqlinjectioncheck($username);


        if (isset($_POST['sex'])){
            $sex =$_POST['sex'];
        }else{
            $sex ='';
        }

        $password=$_POST['password'];
        $password=sqlinjectioncheck($password);
        $password=md5($password);


        $state=$_POST['state'];
        $state=sqlinjectioncheck($state);


        $city=$_POST['city'];
        $city=sqlinjectioncheck($city);
        $city=intval($city);



        $postcode=$_POST['postcode'];
        $postcode=sqlinjectioncheck($postcode);


        $postaddress=$_POST['postaddress'];
        $postaddress=sqlinjectioncheck($postaddress);



        if (isset($_POST['ashnaei'])){
            $ashnaei =$_POST['ashnaei'];
            $ashnaei=sqlinjectioncheck($ashnaei);

        }


        if (isset($_POST['khabarnamehemail'])){
            $khabarnamehemail=1;
        }else{
            $khabarnamehemail=0;
        }

        if (isset($_POST['khbarnamehsms'])){
            $khbarnamehsms=1;
        }else{
            $khbarnamehsms=0;
        }



        $dateofregistering=jdate('H:i:s , Y/n/j');
;


        include ('conection.php');
        $sql="insert into userdata (email,phonenumber,username,sex,password,state,city,postcode,postaddress,ashnaei,khabarnamehemail,khbarnamehsms,dateofregistering) values ('$email','$phonenumber','$username','$sex','$password','$state','$city','$postcode','$postaddress','$ashnaei','$khabarnamehemail','$khbarnamehsms','$dateofregistering')";
        $stat=$db->prepare($sql);
        $stat->execute();echo $sql;

    }

//    $sql="insert into userdata (email,phonenumber,username,sex,password,state,city,postcode,
//          postaddress,ashnaei,khabarnamehemail,khbarnamehsms,dateofregistering) values
//          ('$email','$phonenumber','$username','$sex','$password','$state','$city','$postcode','$postaddress','$ashnaei','$khabarnamehemail','$khbarnamehsms',
//         '$dateofregistering')";
}
