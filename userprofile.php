
<!--<form action="edit_panel_userprofile.php" method="post"  onsubmit="return check()">-->
    <div style="width: 815px;box-shadow: 1px 1px 4px gray ;float: left;	margin-bottom: 20px;background:white;border-radius: 4px">
        <div id="registersection"><span id="registersectionspan">نام کاربری: <b style="color: red">*</b></span>
            <input type="text" name="username" value="<?php echo $result['username']; ?>">
        </div>


        <div id="registersection"><span id="registersectionspan">پست الکترونیکی: <b style="color: red">*</b></span>
            <input style="direction: ltr" type="text" name="email" value="<?php echo $result['email']; ?>" readonly><span id="ceckemail" style="display: none;color:red;
                    margin-right: 20px;">آدرس ایمیل تکراری است</span>
        </div>


        <div id="registersection"><span id="registersectionspan">جنسیت: </span>
            <span> مرد <input  value="1" style="margin: 0" type="radio" name="sex" <?php if( $result['sex']==1){echo "checked";}  ?>></span>

            <span style="margin-right: 20px">زن <input value="0"  style="margin: 0" type="radio" name="sex" <?php if( $result['sex']==0){echo "checked";}  ?>> </span>
        </div>


        <div id="registersection"><span id="registersectionspan">تلفن همراه:  <b style="color: red">*</b></span>
            <input style="direction: ltr;" type="text" name="phonenumber" value="<?php echo $result['phonenumber']; ?>"> <span id="checkphonenumber" style="display: none;color:red;
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

                    if ($result['state']==$id){$select="selected";}else{$select="";}

                    echo '<option value="'.$id.'" '.$select.'>'.$statename.'</option>';


                }


                ?>


            </select>
        </div>

        <div id="registersection"><span id="registersectionspan">نام شهر:  <b style="color: red">*</b></span>
            <select name="city" id="city">
                <option selected value="0">شهر مورد نطر را انتخاب کنید</option>
                <?php
                include ('conection.php');
                $sql="select * from citysname where statesid='".$result['state']."' ";
                $stat=$db->prepare($sql);
                $stat->execute();

                while ($res=$stat->fetch(PDO::FETCH_ASSOC)){

                    $id=$res['id'];
                    $citysname=$res['cityname'];

                    if ($result['city']==$id){$select="selected";}else{$select="";}

                    echo '<option value="'.$id.'" '.$select.'>'.$citysname.'</option>';


                }


                ?>

            </select>
        </div>


        <div id="registersection"><span id="registersectionspan"> کد پستی:  <b style="color: red">*</b></span>
            <input style="direction: ltr" type="text" name="postcode" value="<?php echo $result['postcode']; ?>">
        </div>


        <div id="registersection" style="height: 220px!important;"><span id="registersectionspan"> آدرس پستی:  <b style="color: red">*</b></span>
            <textarea  name="postaddress"><?php echo $result['postaddress']; ?></textarea>
        </div>




        <div id="registersection">
            <span style="direction: rtl;float: right"><input type="checkbox" name="khabarnamehemail" <?php if($result['khabarnamehemail']==1){echo "checked";} ?> > <span>دریافت خبر نامه از طریق ایمیل</span> </span>
            <span style="margin-right: 40px"> <input type="checkbox" name="khbarnamehsms"   <?php if($result['khbarnamehsms']==1){echo "checked";} ?>> <span>دریافت خبر نامه از طریق پیامک</span> </span>

        </div>




        <div id="registersection">
            <input type="submit" name="btn" value="ویرایش">
        </div>



        <br>
        <br>

    </div>

<!--</form>-->


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
        var phonenumber=$("input[name=phonenumber]").val();
        var postcode=$("input[name=postcode]").val();
        var postaddress=$("textarea[name=postaddress]").val();
        var state=$("#state option:selected").val();
        var city=$("#city option:selected").val();







        if(name=='' || name=='لطفا نام خود را وارد کنید'){
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





        // if (error==0){
        //
        //     $.ajax({
        //         type:'post',
        //         url:'emailcheck.php',
        //         async:false,
        //         data:{email:email}
        //
        //
        //     })
        //         .done(function (msg) {
        //
        //             if(msg==1){
        //
        //                 error=1;
        //                 $("#ceckemail").css('display','block');
        //             }
        //
        //         })
        //
        // }




        // if (error==0){
        //
        //     $.ajax({
        //         type:'post',
        //         url:'phonenumbercheck.php',
        //         async:false,
        //         data:{phone:phonenumber}
        //
        //
        //     })
        //         .done(function (msg) {
        //
        //             if(msg==1){
        //
        //                 error=1;
        //                 $("#checkphonenumber").css('display','block');
        //             }
        //
        //         })
        //
        // }



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






</script>