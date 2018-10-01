<?php
include ('conection.php');

    if(!isset($_COOKIE['mybasket'])){

        $random=microtime(true).rand(1,10000);
        setcookie('mybasket',$random,time()+60*60*24,'/');
        $id=$_POST['productid'];
        $sql="insert into basketcooki (cookiname,productid,numberoforder) values ('$random','$id',1) ";
        $stmt=$db->prepare($sql);
        $stmt->execute();

    }
    else{
        $id=$_POST['productid'];


        $cookiename=$_COOKIE['mybasket'];
        $sql="select * from basketcooki where cookiname='".$cookiename."' and productid=".$id." ";
        $stmt=$db->prepare($sql);
        $stmt->execute();
        $num=$stmt->rowCount();

        if($num!=0){



            $sql=" update basketcooki set numberoforder=numberoforder+1 where cookiname='".$cookiename."' and productid=".$id." ";
            $stmt=$db->prepare($sql);
            $stmt->execute();


        }
        else{

            $sql="insert into basketcooki (cookiname,productid,numberoforder) values ('$cookiename','$id',1)  ";
            $stmt=$db->prepare($sql);
            $stmt->execute();
        }






    }


