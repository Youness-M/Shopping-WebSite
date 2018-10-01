<?php
session_start();

if (!isset($_SESSION['email'])){
    if (isset($_COOKIE['remember'])){
        $_SESSION['email']=$_COOKIE['remember'];
    }else{
        header("location:loginPage.php?errorinlogin");
    }
}

include ('conection.php');
$sql="select * from userdata where email='".$_SESSION['email']."' ";
$stat=$db->prepare($sql);
$stat->execute();
$result=$stat->fetch(PDO::FETCH_ASSOC);

if (isset($_GET['ithem'])){
    $ithem=$_GET['ithem'];
}else{
    $ithem='profile';
}



?>

<html>
<head>
    <meta charset="UTF-8" />
    <title>
        <?php
            switch ($ithem){

                case "profile":
                    echo "پروفایل و مشخصات";
                    break;
                case "yourbasket":
                    echo "سبد خرید شما";
                    break;
                case "messages":
                    echo "پیام ها";
                    break;
                case "changepassword":
                    echo " تغییر رمز ورود";
                    break;
            }
        ?>
    </title>
    <link href="Css.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/cycle.js"></script>


</head>

<body style=" margin:0px; padding:0px;">

<?php
include('headertop.php');
?>




    <div id="registercontainer">
        <div style="width: 280px;background: white;box-shadow: 1px 1px 3px gray;float: right">

            <div id="uploadpic" style="width: 100%;height: 313px;box-shadow: 1px 1px 3px gray">

                <?php
                    if (isset($_GET['ithem'])){
                        $ithem=$_GET['ithem'];
                    }else{
                        $ithem='profile';
                    }
                    if($ithem=='profile'){ ?>
                <span style="width: 200px;height: 32px;background: whitesmoke;position: relative;margin-right: 40px;
                text-align: center;line-height: 28px;border-radius: 5px;box-shadow: 1px 1px 3px gray;margin-top:30px">
                    choose your pic
                    <input type="file" name="photo" multiple style="height: 100%;width:100%;position: absolute;top:0px;
                    cursor: pointer;left:3px ;opacity: 0" >
                </span>

                <?php  }   ?>

                <div style="background: whitesmoke;width: 200px;height: 200px;border: 1px solid black;float: right;
                       margin-top:15px;margin-right: 40px">

                </div>

                <div style="margin-top: 40px;width: 100%;float: right;box-shadow: 1px 1px 3px gray">
                    <div style="width: 280px;height: 40px;background: whitesmoke;float: right;margin-top: 5px">
                        <form action="edit_panel_userprofile.php" method="post"  onsubmit="return check()">
                            <a href="userpanel.php?ithem=profile" style="text-decoration: none;font-family: 'B Nazanin';font-weight: 400;font-size: 20px;
                         text-align: right;display: block;line-height: 38px;color: black;margin-right: 10px ">پروفایل و مشخصات</a>
                        </form>
                    </div>

                    <div style="width: 280px;height: 40px;background: whitesmoke;float: right;margin-top: 5px">
                        <a href="userpanel.php?ithem=yourbasket" style="text-decoration: none;font-family: 'B Nazanin';font-weight: 400;font-size: 20px;
                         text-align: right;display: block;line-height: 38px;color: black;margin-right: 10px ">سبد خرید شما</a>
                    </div>

                    <div style="width: 280px;height: 40px;background: whitesmoke;float: right;margin-top: 5px">
                        <a href="userpanel.php?ithem=messages" style="text-decoration: none;font-family: 'B Nazanin';font-weight: 400;font-size: 20px;
                         text-align: right;display: block;line-height: 38px;color: black;margin-right: 10px ">پیام ها</a>
                    </div>

                    <div style="width: 280px;height: 40px;background: whitesmoke;float: right;margin-top: 5px">
                        <a href="userpanel.php?ithem=changepassword" style="text-decoration: none;font-family: 'B Nazanin';font-weight: 400;font-size: 20px;
                         text-align: right;display: block;line-height: 38px;color: black;margin-right: 10px ">تغییر رمز ورود</a>
                    </div>

                    <div style="width: 280px;height: 40px;background: whitesmoke;float: right;margin-top: 5px;margin-bottom: 8px ">
                        <a href="exit.php" style="text-decoration: none;font-family: 'B Nazanin';font-weight: 400;font-size: 20px;
                         text-align: right;display: block;line-height: 38px;color: black;margin-right: 10px;">خروج</a>
                    </div>



                </div>




            </div>

        </div>

        <?php

            switch ($ithem){
                case "profile":
                    include ('userprofile.php');
                    break;
                case "yourbasket":
                    include ('panel_yourbasket.php');
                    break;
                case "messages":
                    include ('panel_yourmessages.php');
                    break;
                case "changepassword":
                    include ('panel_changepassword.php');
                    break;
            }
        ?>


    </div>







<?php
    include('script.php');
?>

<?php
    include('basketscript.php');
?>

</body>

</html>