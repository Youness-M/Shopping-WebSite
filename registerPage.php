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



<form action="registervalidaition.php" method="post"  onsubmit="return check()">

    <div id="registercontainer">
        <div style="width: 280px;background: white;box-shadow: 1px 1px 3px gray;float: right">

            <div id="uploadpic" style="width: 100%;height: 313px;box-shadow: 1px 1px 3px gray">

                <span style="width: 200px;height: 32px;background: whitesmoke;position: relative;margin-right: 40px;
                text-align: center;line-height: 28px;border-radius: 5px;box-shadow: 1px 1px 3px gray;margin-top:30px">
                    choose your pic
                    <input type="file" name="photo" multiple style="height: 100%;width:100%;position: absolute;top:0px;
                    cursor: pointer;left:3px ;opacity: 0" >
                </span>

                <div style="background: whitesmoke;width: 200px;height: 200px;border: 1px solid black;float: right;
                       margin-top:15px;margin-right: 40px">

                </div>




            </div>

        </div>

        <div style="width: 815px;box-shadow: 1px 1px 4px gray ;float: left;	margin-bottom: 20px;background:white;border-radius: 4px">
            <div id="registersection"><span id="registersectionspan">نام کاربری: <b style="color: red">*</b></span>
                <input type="text" name="username" value="">
            </div>


            <div id="registersection"><span id="registersectionspan">پست الکترونیکی: <b style="color: red">*</b></span>
                <input type="text" name="email"><span id="ceckemail" style="display: none;color:red;
                    margin-right: 20px;">آدرس ایمیل تکراری است</span>
            </div>


            <div id="registersection"><span id="registersectionspan">جنسیت: </span>
                <span> مرد <input  value="1" style="margin: 0" type="radio" name="sex"></span>

                <span style="margin-right: 20px">زن <input value="0"  style="margin: 0" type="radio" name="sex"> </span>
            </div>


            <div id="registersection"><span id="registersectionspan">رمز عبور: <b style="color: red">*</b></span>
                <input type="password" name="password">
            </div>
            <div id="registersection"><span id="registersectionspan">تائید رمز عبور:  <b style="color: red">*</b></span>
                <input type="password" name="confirmpassword">
            </div>



            <div id="registersection"><span id="registersectionspan">تلفن همراه:  <b style="color: red">*</b></span>
                <input type="text" name="phonenumber"> <span id="checkphonenumber" style="display: none;color:red;
                    margin-right: 20px;">شماره تلفن تکراری است</span>
            </div>


            <div id="registersection"><span id="registersectionspan">نام استان:  <b style="color: red">*</b></span>



                <select name="state" id="state">
                    <option selected value="0">استان مورد نطر را انتخاب کنید</option>
                    <?php
                        include ('conection.php');
                        $sql="select * from statesname ";
                        $stat=$db->prepare($sql);
                        $stat->execute();

                        while ($res=$stat->fetch(PDO::FETCH_ASSOC)){

                            $id=$res['id'];
                            $statename=$res['statename'];

                            echo '<option value="'.$id.'">'.$statename.'</option>';


                        }


                    ?>


                </select>
            </div>

            <div id="registersection"><span id="registersectionspan">نام شهر:  <b style="color: red">*</b></span>
                <select name="city" id="city">
                    <option selected value="0">شهر مورد نطر را انتخاب کنید</option>



                </select>
            </div>


            <div id="registersection"><span id="registersectionspan"> کد پستی:  <b style="color: red">*</b></span>
                <input type="text" name="postcode">
            </div>


            <div id="registersection" style="height: 220px!important;"><span id="registersectionspan"> آدرس پستی:  <b style="color: red">*</b></span>
                <textarea  name="postaddress"></textarea>
            </div>


            <div id="registersection"><span id="registersectionspan"> نحوه آشنایی:  </span>
                <select name="ashnaei" id="">
                    <option selected value="0">نحوه ی آشنایی را انتخاب کنید</option>
                    <option value="1">سایت</option>
                    <option value="2">فضای مجازی</option>
                    <option value="3">تبلیغات</option>
                    <option value="4">معرفی دوستان</option>
                    <option value="5">سایر موارد </option>


                </select>
            </div>


            <div id="registersection">
                <span style="direction: rtl;float: right"><input type="checkbox" name="khabarnamehemail"> <span>دریافت خبر نامه از طریق ایمیل</span> </span>
                <span style="margin-right: 40px"> <input type="checkbox" name="khbarnamehsms"> <span>دریافت خبر نامه از طریق پیامک</span> </span>

            </div>

            <div id="registersection"><span id="registersectionspan"> کد مقابل را وارد کنید:  <b style="color: red">*</b></span>
                <input type="text" name="capchacode" style="width: 100px">
                <span style="width: 170px;height: 50px;margin-right: 10px;
            border-radius: 5px;box-shadow: 1px 1px 2px gray;
            overflow: hidden"> <img id="capchaimg" src="1536075580161.png" alt="" style="cursor: pointer"> </span>
            </div>


            <div id="registersection">
                <input type="submit" name="btn" value="ثبت نام">

                <input id="cancel" type="submit" name="btn" value="انصراف">
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
        var name=$("input[name=username]").val();
        var email=$("input[name=email]").val();
        var password=$("input[name=password]").val();
        var confirmpassword=$("input[name=confirmpassword]").val();
        var phonenumber=$("input[name=phonenumber]").val();
        var postcode=$("input[name=postcode]").val();
        var postaddress=$("textarea[name=postaddress]").val();
        var state=$("#state option:selected").val();
        var city=$("#city option:selected").val();
        var capchacode=$("input[name=capchacode]").val();







        if(name=='' ||  name=='لطفا نام خود را وارد کنید'){
            error=1;
            $("input[name=username]").attr("placeholder"," لطفا نام خود را وارد کنید");
            $("input[name=username]").val('لطفا نام خود را وارد کنید');

            $("input[name=username]").addClass('red');


        }else{
            $("input[name=username]").removeClass('red');
        }



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
        else if(confirmpassword != password) {
            error = 1;
            alert('تکرار رمز ورود مطابقت ندارد');
            $("input[name=confirmpassword]").addClass('red');
        }

        else{
            $("input[name=password] ").removeClass('red');
            $("input[name=confirmpassword] ").removeClass('red');


        }



        var regexp=/^0{1}9{1}[0-9]{9}$/;
        if(regexp.test(phonenumber)==false){
            error=1;
            $("input[name=phonenumber]").val("تلفن وارد شده صحیح نمی باشد");
            $("input[name=phonenumber]").attr("placeholder"," تلفن وارد شده صحیح نمی باشد");

            $("input[name=phonenumber]").addClass('red');

        }else{
            $("input[name=phonenumber]").removeClass('red');
        }



        var regexp=/^[0-9]{10}$/;
        if(regexp.test(postcode)==false){
            error=1;
            $("input[name=postcode]").val("کد پستی وارد شده صحیح نمی باشد");
            $("input[name=postcode]").attr("placeholder"," کد پستی وارد شده صحیح نمی باشد");

            $("input[name=postcode]").addClass('red');

        }else{
            $("input[name=postcode]").removeClass('red');
        }





        if(postaddress=='' || postaddress=='آدرس پستی وارد شده صحیح نمی باشد'){
            error=1;
            $("textarea[name=postaddress]").val('آدرس پستی وارد شده صحیح نمی باشد');
            $("textarea[name=postaddress]").attr("placeholder","آدرس پستی وارد شده صحیح نمی باشد ");

            $("textarea[name=postaddress]").addClass('red');

        }else{
            $("textarea[name=postaddress]").removeClass('red');
        }




        if(state==0){
            error=1;

            $("#state").addClass('red');

        }else{
            $("#state").removeClass('red');
        }




        if(city==0){
            error=1;

            $("#city").addClass('red');

        }else{
            $("#city").removeClass('red');
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



        if (error==0){

            $.ajax({
                type:'post',
                url:'emailcheck.php',
                async:false,
                data:{email:email}


            })
                .done(function (msg) {

                    if(msg==1){

                        error=1;
                        $("#ceckemail").css('display','block');
                    }

                })

        }




        if (error==0){

            $.ajax({
                type:'post',
                url:'phonenumbercheck.php',
                async:false,
                data:{phone:phonenumber}


            })
                .done(function (msg) {

                    if(msg==1){

                        error=1;
                        $("#checkphonenumber").css('display','block');
                    }

                })

        }



        if (error==1){return false}

    }



    $("input[name=username],input[name=postcode],input[name=email],input[name=phonenumber],textarea[name=postaddress]").click(function () {

        var red=$(this).attr('class');
        if(red=='red' ){
            $(this).val('');

        }

    })




    $("#state").change(function () {

        var stateid=$(this).find('option:selected').val();

        $.ajax({

            type:'post',
            url:'stateidandcity.php',
            data:{idstate:stateid}
        })
        .done(function (msg) {
            $("#city").html(msg);
        })

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