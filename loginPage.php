<?php
session_start();
if (isset($_SESSION['email']) or isset($_COOKIE['remember'])){

        header("location:userpanel.php");

}

?>


<html>
<head>
    <meta charset="UTF-8" />
    <title> فروشگاه اینترنتی </title>
    <link href="Css.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/cycle.js"></script>


</head>

<body style=" margin:0px; padding:0px;">

<?php
  include('headertop.php');
?>



<form action="loginprocess.php" method="post"  onsubmit="return check()">

    <div id="login">

        <div style="width: 500px;box-shadow: 1px 1px 4px gray ;background:white;border-radius: 4px;margin: 0 auto;padding-top: 20px">
            <div id="registersection"><span id="registersectionspan">پست الکترونیکی: <b style="color: red">*</b></span>
                <input type="text" name="email" style="width: 280px! important"><span id="ceckemail" style="display: none;color:red;
                    margin-right: 20px;">آدرس ایمیل تکراری است</span>
            </div>


            <div id="registersection" ><span id="registersectionspan" >رمز عبور: <b style="color: red">*</b></span>
                <input type="password" name="password" style="width: 280px! important">
            </div>



            <div id="registersection" s><span id="registersectionspan"> کد مقابل را وارد کنید:  <b style="color: red">*</b></span>
                <input type="text" name="capchacode" style="width: 100px">
                <span style="width: 170px;height: 50px;margin-right: 10px;;margin-left:65px;
            border-radius: 5px;box-shadow: 1px 1px 2px gray;
            overflow: hidden"> <img id="capchaimg" src="1536075580161.png" alt="" style="cursor: pointer"> </span>
            </div>



            <div id="registersection" style="margin-top: 30px!important;">
                <input type="submit" name="btn" value="ورود " style="width: 280px;background: whitesmoke">
            </div>

            <div id="registersection" ><span id="registersectionspan" >مرا بخاطر بسبار </span>
                <input type="checkbox" name="remember" >
            </div>



            <br>
            <br>

        </div>


    </div>

</form>


<style>
    .red{
        background: #FD8083 !important;

    }

</style>

<script>





    function check(){

        $("#ceckemail").css('display','none');
        $("#checkphonenumber").css('display','none');



        var error=0;
        var email=$("input[name=email]").val();
        var password=$("input[name=password]").val();
        var capchacode=$("input[name=capchacode]").val();






        var regexp=/^[0-9a-z]+[\.-_0-9a-z]+@{1}[0-9a-z]+\.[a-z]{2,4}$/i;
        if(regexp.test(email)==false){
            error=1;
            $("input[name=email]").attr("placeholder"," ادرس ایمیل اشتباه است");
            $("input[name=email]").val("ادرس ایمیل اشتباه است");

            $("input[name=email]").addClass('red');

        }else{
            $("input[name=email]").removeClass('red');
        }




        var regexp=/^[0-9a-z]{4,10}$/i;
        if(regexp.test(password)==false){
            error=1;
            alert('رمز ورود را درست وارد کنید');
            $("input[name=password]").addClass('red');


        }
        else{
            $("input[name=password] ").removeClass('red');


        }




        if (error==0){

            $.ajax({
                type:'post',
                url:'checkcapchacode.php',
                async:false,
                data:{capchacode:capchacode}


            })
                .done(function (msg) {

                    if(msg==1){
                        error=0;
                        $("input[name=capchacode]").removeClass('red');
                    }else{
                        error=1;
                        $("input[name=capchacode]").addClass('red');
                    }

                })

        }







        if (error==1){return false}

    }



    $("input[name=email]").click(function () {

        var red=$(this).attr('class');
        if(red=='red' ){
            $(this).val('');

        }

    })




    $.ajax({

        url:'capcha.php'

    })
        .done(function (msg) {

            $("#capchaimg").attr('src',+msg+'.png');
        })




    $("#capchaimg").click(function () {

        $.ajax({

            url:'capcha.php'

        })
            .done(function (msg) {

                $("#capchaimg").attr('src',+msg+'.png');
            })

    })
</script>



<?php
include('script.php');
?>

<?php
include('basketscript.php');
?>

</body>

</html>