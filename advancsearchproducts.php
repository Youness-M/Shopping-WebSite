<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">

<?php
    include('myfirstclass.php');
    $object=new myfirstclass();
    $numberinpage=1;


?>


<div style="width: 1325px;margin: 0 auto">
    <div id="rightpanelinadvancsearch">
        <span id="costdetermain" style="font-family: 'B Nazanin';font-weight: 400;font-size: 18px;float: right;
                        margin-right: 5px;margin-top: 5px;text-align: center;width: 100%;margin-bottom: 5px">
            تعیین محدوده قیمت
        </span>

        <style>
            .ui-slider-handle{
                border-radius: 100%;
                width: 15px!important;
                height: 15px!important;
                top: -1px!important;
                background: whitesmoke!important;
                border: 1px solid gray!important;
            }
            .ui-slider-range{
                background: gray;
                border-radius: 5px!important;
            }
            .ui-slider{
                border-radius: 10px!important;

            }
            .ui-slider-horizontal{
                margin-right: 10px!important;
            }


        </style>
        <div id="amount" style="width: 100%;padding: 25px 0;float: right;height: 30px;background:whitesmoke;
                position: relative;box-shadow: 1px 1px 5px gray">


            <div class="slider " style="float: right;margin-top:0px;width: 223px;margin-right: 14px ">


            </div>

            <spaan style="position: absolute;top: 50px;left: 5px;font-family: 'B Nazanin';font-size: 14px;
                    font-weight: 400;direction: rtl">
                <a id="minamounte" href="" style="text-decoration: none;color: black">1000</a> تومان
            </spaan>

            <spaan style="position: absolute;top: 50px;right: 5px;font-family: 'B Nazanin';font-size: 14px;
                    font-weight: 400;direction: rtl">
                <a id="maxamounte" href="" style="text-decoration: none;color: black">500000</a> تومان
            </spaan>
        </div>



        <script>
            $(".slider").slider({
                min:1000,
                max:500000,
                values:[1000,500000],
                range:true,
                slide:function (event,ui) {
                    $("#maxamounte").html(ui.values[1]);
                    $("#minamounte").html(ui.values[0]);

                    page=1;
                    begard();

                }



            })
        </script>

    <div id="category">

           <span>انتخاب دسته بندی</span>

        <ul>
            <li><a href="">گوشی همراه</a></li>
        </ul>
        <ul>
            <li><a href="">تجهیزات خانگی</a></li>
        </ul>
        <ul>
            <li><a href="">تلویزیون</a></li>
        </ul>
        <ul>
            <li><a href="">کامپیوتر</a></li>
        </ul>
        <ul>
            <li><a href="">ماشین</a></li>
        </ul>

    </div>

    </div>













    <div id="topadvancsearch">
        <div id="numberofproductshow" style="width: 250px;height: 30px;position: absolute;right: 5px;top:5px">
                <span style="float:right;direction: rtl;padding-right: 5px;line-height: 30px;
                    font-family: 'B Nazanin';font-size: 18px;font-weight: 400">

                    تعداد نمایش:

                </span>

            <a class="choosedpage">1</a>
            <a>3</a>
            <a>6</a>
        </div>

        <div id="doesexist" style="width: 250px;height: 30px;position: absolute;right: 400px;top:5px">
                <span style="float:right;direction: rtl;padding-right: 5px;line-height: 30px;
                    font-family: 'B Nazanin';font-size: 18px;font-weight: 400">

                    نمایش محصولات موجود:

                </span>

            <div id="backgroundofexistproduct" style="position: absolute;width: 50px;height: 25px;background: white;left: 45px;top:2px;border-radius: 8px;border: 1px solid gray">
                <span id="checkedbox" style="width:30px;height: 30px; background: url(img/circle.png) no-repeat;float: right;position: absolute;left:-5px;top:-3px;">
                    <input name="existproduct" id="existproduct" style="width: 100%;height: 100%;opacity: 0" type="checkbox">
                </span>

            </div>

        </div>

        <script>
            $("#existproduct").change(function () {
                if ( $(this).is(':checked')){

                    $("#checkedbox").animate({left:'26px'},500,function () {$("#backgroundofexistproduct").css('background','gray') });
                }else {
                    $("#checkedbox").animate({left:'-5px'},500,function () {$("#backgroundofexistproduct").css('background','white') });
                }
            })
        </script>

        <div id="numberofshow" style="width: 260px;height: 30px;position: absolute;left: 20px;top:5px">
                <span style="float:right;direction: rtl;padding-right: 5px;line-height: 30px;
                    font-family: 'B Nazanin';font-size: 18px;font-weight: 400">

                    ترتیب نمایش محصولات:

                </span>
            <select id="orderbythis" style="float: left;position: absolute;top:3px;left: 4px;direction: rtl;padding: 3px" name="" >
                <option value="1">جدیدترین ها</option>
                <option value="2">پرفروش ترین ها</option>
                <option value="3">محبوب ترین ها</option>
            </select>


        </div>

        <div id="numberofshow" style="width: 550px;height: 30px;position: absolute;right: 5px;top:65px">
            <input name="inputsearch" style="direction: rtl;float:right;width: 260px;height: 100%;padding-right: 5px;	border: 1px solid gray;
                        ;" type="text">

            <span id="advancsearchbtn" style="float:right;direction: rtl;line-height: 26px;
                    font-family: 'B Nazanin';font-size: 18px;font-weight: 400;width: 70px; margin-right: 2px;
                    text-align: center;background: white;cursor: pointer;border: 1px solid gray;height: 28px;">
                    جستجو

                </span>
            <span  style="float:right;direction: rtl;line-height: 30px;position: relative;
                    font-family: 'B Nazanin';font-size: 18px;font-weight: 400;width: 200px; margin-right: 5px;
                    text-align: right;padding-right: 5px;background: ">

                    <span id="numberofsearch"  style="text-align: center!important;position: absolute;right: 130px;
                    font-family: 'B Nazanin';font-size: 18px;font-weight: 400;">
                        1200
                    </span> تعداد نتایج یافت شده:

                </span>

        </div>

        <script>
            $("#advancsearchbtn").click(function(){
                var keyword=$("input[name=inputsearch]").val();

                $.ajax({
                    type:'POST',
                    url:'searchproductbykeywords.php',
                    dataType:'json',
                    data:{keyword:keyword}
                })
                    .done(function (msg) {
                        alert(msg);
                        $("#numberofsearch").html(msg[0]);
                        $("#insertproductsbyajax").html('');

                        $.each(msg[1],function(index,val){


                            var id=val[0];

                            if (val[4]==0){
                                var productstatus='ناموجود';
                                var colorstatus='#ffa500';
                                var cost=0;
                            }else{
                                var productstatus='موجود';
                                var colorstatus='#36CDDF';
                                var cost=val[5];

                            }
                            $("#insertproductsbyajax").append('<li ><a ><img src="'+val[2]+'" id="image"> <br /><span id="title">'+val[1]+'</span></a><div id="detectProduct"><a id="'+id+'" class="x1">افزودن به سبد خرید</a><a class="x2" >مشاهده توضیحات</a> <a class="x3" href="#">محصولات مشابه</a></div><div style="width: 100%; height: 30px;margin-top: 8px;margin-bottom: 2px"><span id="price">قیمت: <span id="cost1">'+cost+'</span> تومان </span> <span id="statuscase" style="background:'+colorstatus+'">'+productstatus+'</span></div></li>');
                        })



                    })
            })
        </script>





        <style>
            .choosedpage{
                background: red!important;
            }
        </style>


        <div id="numberofshow" style="width: 265px;height: 30px;position: absolute;left: 20px;top:65px">


            <a href="" style="background: url(img/prev1.png) no-repeat 8px 5px;text-align: center;margin-left: -8px;border: none"></a>
            <span id="numberofpageshow">
                    <?php
                    $sql="select * from newproducts_tbl";
                    $resultformtbl=$object->num($sql);
                    $numberofproduct=$resultformtbl;
                    $numberinpage=1;
                    $numberofpage=ceil($numberofproduct/$numberinpage);


                    for ($i=1;$i<=$numberofpage;$i++){

                        $firstpageactive='';
                        if ($i==1){$firstpageactive='choosedpage';}
                        else{$firstpageactive='';}
                        $display='';
                        if($i>5){$display='display:none';}


                        echo '<a class="pager '.$firstpageactive.'" style="'.$display.'">'.$i.'</a>';
                    }

                    ?>
            </span>




            <a href="" style="background: url(img/next1.png) no-repeat 8px 5px;text-align: center;margin-right: 1px;border: none""></a>

        </div>


        <script>

            // var numberofproducts=20;
            // var numberoftotalpage=Math.ceil(numberofproducts/numberinpage);
            // var i=1;
            // for (i;i<=numberoftotalpage;i++){
            //     var display='';
            //     if (i>5){display='display:none'}
            //     $("#numberofpageshow").append('<a class="pager" onclick="pager('+i+')" style="'+display+'">'+i+'</a>')
            // }
            //


            // function pager(number){
            //
            //     $(".pager").each(function (index,element){
            //         $(this).removeClass('choosedpage');
            //         $(this).hide();
            //         var x=$(this).text();
            //         if (number!=1 && number!=2 ){
            //             if (x>=number-2 && x<=number+2){
            //                 $(this).show();
            //             }
            //
            //         }else{ if (x>=number-(5) && x<=number+(5-number)){
            //             $(this).show();
            //         }}
            //
            //     })
            //
            //     var choosedpagee=number-1;
            //     $(".pager:eq("+choosedpagee+")").addClass('choosedpage');
            // }


        </script>


    </div>

    <div id="mostsel" style="width: 1060px;float: left;margin-top: 10px">

        <ul id="insertproductsbyajax">
            <?php
            $sql="select * from newproducts_tbl order by id desc limit 2";
            $result=$object->select($sql);

            foreach($result as $res){
                $id=$res['id'];
                if ($res['numberofproduct']==0){
                    $productstatus='ناموجود';
                    $colorstatus='#ffa500';
                    $cost='0';
                }else{
                    $productstatus='موجود';
                    $colorstatus='#36CDDF';
                    $cost=$res['cost'];

                }

                echo'<li ><a href=""><img src="'.$res['img'].'" alt="" id="image"> <br /><span id="title">'.$res['title'].'</span></a>
                        <div id="detectProduct">
                            <a id='.$id.' class="x1">افزودن به سبد خرید</a>
                            <a class="x2" href="#">مشاهده توضیحات</a>
                            <a class="x3" href="#">محصولات مشابه</a>
        
                        </div>
        
                        <div style="width: 100%; height: 30px;margin-top: 8px;margin-bottom: 2px">
                            <span id="price">
                            
                            قیمت: <span id="cost1">'.$cost.'</span> تومان
                            
                            </span>
                            <span id="statuscase" style="background:'.$colorstatus.'">'.$productstatus.'</span>
                        </div>
                        </li>';

            }

            ?>

        </ul>



    </div>

    <script>
    var page=1;

    $("#numberofpageshow .pager").click(function (){

        page=$(this).text();
        begard();

    })

    $("#numberofproductshow a").click(function () {

        $("#numberofproductshow a").each(function (index,element) {
            $(this).removeClass('choosedpage');


        });

        $(this).addClass('choosedpage');
        page=1;
        begard();
    })


    $("#existproduct").click(function () {
        page=1;
        begard();

    })

    $("#orderbythis").change(function () {
        page=1;
        begard();
    })

    $("#advancsearchbtn").click(function () {
        page=1;
        begard();
    })



    function pager(number){
        number=parseInt(number);

            $(".pager").each(function (index,element){
                $(this).removeClass('choosedpage');
                $(this).hide();
                var x=$(this).text();
                if (number!=1 && number!=2 ){

                    if (x>=number-2 && x<=number+2){
                        $(this).show();
                    }

                }else{ if (x>=number-(5) && x<=number+(5-number)){
                    $(this).show();
                }}

            })

            var choosedpagee=number-1;
            $(".pager:eq("+choosedpagee+")").addClass('choosedpage');
        }





        function begard() {


            var isexist='';

            if ( $("input[name=existproduct]").is(':checked')){isexist=1;}
            else {isexist=0;}

            var minmount=$("#minamounte").text();
            var maxmount=$("#maxamounte").text();

            var order=$("#orderbythis option:selected").val();
            var numberinpage=$("#numberofproductshow .choosedpage").text();

            var keyword=$("input[name=inputsearch]").val();


            $.ajax({
                type:'post',
                url:'result.php',
                dataType:'json',
                data:{page:page,isexist:isexist,minmount:minmount,maxmount:maxmount,order:order,numberinpage:numberinpage,keyword:keyword}
            })
                .done(function (msg) {
                    // alert(msg[0]);
                    $("#numberofsearch").html(msg[0]);
                    $("#insertproductsbyajax").html('');

                    $.each(msg[1],function(index,val){


                        var id=val[0];

                        if (val[4]==0){
                            var productstatus='ناموجود';
                            var colorstatus='#ffa500';
                            var cost=0;
                        }else{
                            var productstatus='موجود';
                            var colorstatus='#36CDDF';
                            var cost=val[5];

                        }
                        $("#insertproductsbyajax").append('<li ><a ><img src="'+val[2]+'" id="image"> <br /><span id="title">'+val[1]+'</span></a><div id="detectProduct"><a id="'+id+'" class="x1">افزودن به سبد خرید</a><a class="x2" >مشاهده توضیحات</a> <a class="x3" href="#">محصولات مشابه</a></div><div style="width: 100%; height: 30px;margin-top: 8px;margin-bottom: 2px"><span id="price">قیمت: <span id="cost1">'+cost+'</span> تومان </span> <span id="statuscase" style="background:'+colorstatus+'">'+productstatus+'</span></div></li>');
                    })


                    $("#numberofpageshow").html('');

                    var numberofproducts=msg[0];
                    var numberoftotalpage=Math.ceil(numberofproducts/numberinpage);
                    var i=1;
                    for (i;i<=numberoftotalpage;i++){

                        var display='';

                        $("#numberofpageshow").append('<a style="'+display+'" class="pager " >'+i+'</a>');
                    }

                    pager(page);

                    $("#numberofpageshow .pager").click(function (){

                        page=$(this).text();

                        begard();

                    })


                })

        }








    </script>



</div>


<script>

    $("#mostsel #detectProduct").hover(function () {
        $(this).animate({opacity:0.8},500);
        $(this).addClass('borderClass');


    },function (){
        $(this).animate({opacity:0},500);
        $(this).removeClass('borderClass');

    })

</script>




<!--mostseen-->



<!--end of mostseen-->

<?php
    include ('basketscript.php');
?>