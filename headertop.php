<div id="top line" style="background:black; width:100%; height:5px;"> </div>

<div id="header" style="background:whitesmoke; width:1100px;height:40px; margin:0 auto;
		text-align:right; direction:rtl; line-height:35px;">

    <a style="font-family: 'B Nazanin';font-weight: 400;font-size: 18px;text-decoration: none;
            color:black;" href="index.php"> بازگشت به صفحه نخست </a>
    <span> | </span>
    <a> درباره ما </a>
    <span> | </span>
    <a> تماس با ما </a>


    <a style="margin-top:-8px; margin-right:160px;"> <img src=""> </a>

    <div id="basketclick" style="cursor: pointer;position: relative; background: #FD8083!important;">
        <a id="numberofproduct" style="float: left;position: absolute;width: 25px;height: 25px;border-radius: 100%;background: red;
            top:7px;left:-26px;text-align: center;line-height: 22px;color: white "></a>
        <a  style="float:left; margin-left:5px;"><img src="img/sabad.png" style="position: relative;">سبد خرید شما</a>
    </div>


    <div id="popupbasket">

        <div id="paying" style="width: 100%; height: 50px;background: whitesmoke;padding: 0;float: none;margin: 10px auto;box-shadow: 1px 1px 4px gray">
            <span style="width:200px ;font-family: 'B Nazanin';font-size: 18px;font-weight: 600;line-height: 50px;
            margin-right: 15px;">

                مبلغ کل فاکتور:<spand id="totalpriceofbasket"></spand>  تومان

            </span>
            <a style="width:140px;height: 40px ;background: white ;font-family: 'B Nazanin';font-size: 20px;
            font-weight: 600;line-height: 37px;margin: 5px auto;border-radius: 5px;text-align: center;cursor: pointer">
                تسویه و پرداخت
            </a>

        </div>

        <div id="buybasket">

            <?php

            include ('conection.php');
            if (isset($_COOKIE['mybasket'])){


                $sql="select * from basketcooki where cookiname='".$_COOKIE['mybasket']."' ";
                $stat=$db->prepare($sql);
                $stat->execute();

                while ($res=$stat->fetch(PDO::FETCH_ASSOC)){

                    $id=$res['productid'];

                    $sql1="select * from newproducts_tbl where id=".$id." ";
                    $stat1=$db->prepare($sql1);
                    $stat1->execute();
                    $res1=$stat1->fetch(PDO::FETCH_ASSOC);
                    $img=$res1['img'];


                    echo (' <ul id="'.$id.'">
                        <li  id="'.$id.'" style="width: 80px;height: 70px;border-left: 1px solid black">
                            <img src="'.$img.'" alt="" style="width: 100%;height: 100%">
                        </li>
            
                        <li  id="'.$id.'" style="width: 224px;height: 70px;direction:rtl">
                            <div style="width: 100%;height: 41px;">
                                <a style="margin-right: 5px;line-height: 25px;font-family: \'B Nazanin\';font-weight: 600;font-size: 18px" >'.$res1['title'].'</a>
            
                            </div>
                            <div style="width: 100%;height: 25px;" id="'.$id.'">
                                <a style="margin-right: 5px;line-height: 20px;font-family: \'B Nazanin\';font-weight: 600;font-size: 18px">تعداد:<span style="float: none" id="tedad">'.$res['numberoforder'].'</span></a>
                                <a style="margin-left: 5px;line-height: 20px; float: left;font-family: \'B Nazanin\';font-weight: 600;font-size: 18px">قیمت واحد: <span style="float: none" id="costofproduct">'.$res1['cost'].'</span> </a>
                            </div>
            
                        </li>
            
                        <li id="'.$id.'" style="width: 50px;height: 70px;border-right: 1px solid black">
                            <img id="removebasket" src="img/delet.png" alt="" style="width: 30px;height: 30px;margin-top: 18px;margin-left: 10px;float: left">
                        </li>
                    </ul>');

                }


            }


            ?>

            <a id="emptybasket" style="display: none;text-decoration: none;margin-right: 10px;
                        margin-bottom:25px;font-family: 'B Nazanin';font-weight: 600;font-size: 20px;
                        width:100% ;color:black;text-align: center;margin-top: 25px;">سبد خرید شما خالی می باشد
            </a>;

        </div>




    </div>




</div>

<div id="productaddremovefrombasket">

    <h3 style="">  <span  id="addtitle"></span> به سبد خرید اضافه شد </h3>
    <img id="closeimg" src="img/close.png" alt="">

    <a id="paymoney" href="">

        تسویه و پرداخت</a>

    <a id="edamekharid">
        ادامه خرید
    </a>


</div>
<div id="productremovefrombasket">

    <h3 style="">  <span  id="addtitle"></span> با موفقیت از سبد خرید شما حذف شد </h3>
    <img id="closeimgdelet" src="img/close.png" alt="">


</div>

<div id="darkpage" style="width: 100%;height: 100%;position: fixed;background:
black;z-index: 11;top:0;display: none;opacity: 0;cursor: pointer"></div>

<script>
    $("#basketclick").click(function () {
        $("#popupbasket").show();
        $("#popupbasket").animate({opacity:1},1000);


        $("#darkpage").show();
        $("#darkpage").animate({opacity:0.6},1000);


    })

    $("#darkpage").click(function () {

        $("#popupbasket").animate({opacity:0},700,function(){$("#popupbasket").hide();});
        $("#darkpage").animate({opacity:0},700,function(){$("#darkpage").hide();});
        

    })
</script>


<div style="width:100%; height: 5px; background:black"></div>



<div style="width:100%; height: 37px; background:black; margin-top:3px;">

    <div id="menubar" style="width:1100px; height:100%; background:gray; margin:auto;
			position:relative;">
        <ul>
            <li><a href="index.php" style="text-decoration: none; color: black;
                font-family: 'B Nazanin';font-weight: 400;font-size: 18px"><img style="margin-left:3px " src="img/home54.png">صفحه نخست</a></li>

            <?php
                include('conection.php');
                $sql="SELECT * FROM menu_tbl";
                $stat=$db->prepare($sql);
                $stat->execute();

                while($res=$stat->fetch(PDO::FETCH_ASSOC)){

                    echo '<li><img src="'.$res['img'].'">'.$res['title'];

                    $parent=$res['title'];
                    $sqlsub="SELECT * FROM submenu_tbl WHERE parent='".$parent."'";
                    $statsub=$db->prepare($sqlsub);
                    $statsub->execute();
                    $num=$statsub->rowCount();
                    if ($num>0){ echo '<ul>';}
                        while ($ressub=$statsub->fetch(PDO::FETCH_ASSOC)){
                            echo '<li>'.$ressub['title'].'</li>';
                        }


                    if ($num>0){ echo '</ul>';}

                    echo'</li>';
                }

            ?>
        </ul>
    </div>

    <div id="slidemenu">

    </div>

    <div id="registering">
        <div id="satbtenam"><a href="registerPage.php">ثبت نام</a></div>
        <div id="loginuser"><a href="loginPage.php">ورود کاربران</a></div>
        <div id="adsearch"><a href="advancesearch.php">جستجوی پیشرفته</a></div>
        <div id="usualsearch" style="width:455px;!important;background:none;direction: rtl;">

                <input name="searchbtn" type="text" style="width: 386px;height: 100%;vertical-align:middle;float: right">

                <span id="searchbtn" style="float:right;direction: rtl;line-height: 25px;
                        font-family: 'B Nazanin';font-size: 14px;font-weight: 600;width: 60px;height: 28px; margin-right: 5px;margin-top: 1px;
                        text-align: center;background: whitesmoke;box-shadow: 1px 1px 3px gray;cursor: pointer">
                        جستجو

                    </span>

<!--                <input name="advancsearchbtn" type="submit" value="جستجو" style="vertical-align:middle;height: 100%;font-size: 14px;font-weight: 600;font-family: 'B Nazanin'">-->


        </div>

    </div>

</div>

<!--<script>-->
<!--    $("#searchbtn").click(function(){-->
<!--        var keyword=$("input[name=searchbtn]").val();-->
<!---->
<!--        $.ajax({-->
<!--            type:'POST',-->
<!--            url:'searchproductbykeywords.php',-->
<!--            dataType:'json',-->
<!--            data:{keyword:keyword}-->
<!--        })-->
<!--            .done(function (msg) {-->
<!--                alert(msg);-->
<!--                $("#numberofsearch").html(msg[0]);-->
<!--                $("#insertproductsbyajax").html('');-->
<!---->
<!--                $.each(msg[1],function(index,val){-->
<!---->
<!---->
<!--                    var id=val[0];-->
<!---->
<!--                    if (val[4]==0){-->
<!--                        var productstatus='ناموجود';-->
<!--                        var colorstatus='#ffa500';-->
<!--                        var cost=0;-->
<!--                    }else{-->
<!--                        var productstatus='موجود';-->
<!--                        var colorstatus='#36CDDF';-->
<!--                        var cost=val[5];-->
<!---->
<!--                    }-->
<!--                    $("#insertproductsbyajax").append('<li ><a ><img src="'+val[2]+'" id="image"> <br /><span id="title">'+val[1]+'</span></a><div id="detectProduct"><a id="'+id+'" class="x1">افزودن به سبد خرید</a><a class="x2" >مشاهده توضیحات</a> <a class="x3" href="#">محصولات مشابه</a></div><div style="width: 100%; height: 30px;margin-top: 8px;margin-bottom: 2px"><span id="price">قیمت: <span id="cost1">'+cost+'</span> تومان </span> <span id="statuscase" style="background:'+colorstatus+'">'+productstatus+'</span></div></li>');-->
<!--                })-->
<!---->
<!---->
<!---->
<!--            })-->
<!--    })-->
<!--</script>-->

