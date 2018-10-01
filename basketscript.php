
<script>
    var id=0;




    function emptybasketmsg() {

        var isempty=$("#buybasket div").length;

        if (isempty==0){
            $("#emptybasket").show();
            $("#paying").hide();
        }

    }
    emptybasketmsg()


    function numberofchosedproduct() {
        var number=0;

        $("#buybasket li #tedad").each(function(index,element) {

            parseInt($(this).html());
            number=number+parseInt($(this).html());
        });


        $.ajax({
            type:'post',
            url:'headertop.php',
            data:{numberofproduct:number}

        })
            .done(function () {
                $("#basketclick #numberofproduct").html(number);

            })
    }

    numberofchosedproduct();



    function totalprice() {
        var numberofeachproduct=0;
        var price=0;
        var totalprice=0;

        $("#buybasket ul").each(function (index,element) {

            numberofeachproduct=$(this).find('#tedad').html();
            price=$(this).find('#costofproduct').html();

            totalprice=totalprice+parseInt(numberofeachproduct)*parseInt(price);

        });

        $.ajax({
            type:'post',
            url:'headertop.php',
            data:{numberofproduct:totalprice}

        })
            .done(function () {
                $("#popupbasket #totalpriceofbasket").html(totalprice);

            })

    }

    totalprice();



    function removefrombasket(){

        $("#buybasket #removebasket").click(function () {

            id=$(this).parents('li').attr('id');

            $.ajax({
                type:'post',
                url:'deletebasketproduct.php',
                data:{productid:id}

            })

                .done(function () {
                    $("#popupbasket #"+id+" ").remove();
                    numberofchosedproduct();
                    totalprice();
                    emptybasketmsg()




                })




        })


    }
    removefrombasket();

    $("#mostsel #detectProduct .x1").click(function () {
        id=$(this).attr('id');
        var length='';
        var cost1='';
        var image='';
        var title='';

        var li=$(this).parents('li');

        length=$("#buybasket #"+id+"").length;

        image=li.find('#image').attr('src');
        title=li.find("#title").html();
        cost1=li.find("#cost1").html();

        $.ajax({
            type:'post',
            url:'basketid.php',
            data:{productid:id}

        })

            .done(function () {

                if (length!=0){


                    var tedad=0;
                    tedad=$("#buybasket #"+id+" #tedad").html();
                    tedad=parseInt(tedad);
                    tedad=tedad+1;



                    $("#buybasket #"+id+" #tedad").html(tedad);




                }
                else{

                    // $("#buybasket").append('<ul id="'+id+'"><li>'+cost1+'</li></ul>');
                    $("#buybasket").append('<ul id='+id+'><li id='+id+' style="width: 80px;height: 70px;border-left: 1px solid black"><img src="'+img+'" alt="" style="width: 100%;height: 100%"></li> <li  id='+id+' style="width: 224px;height: 70px;direction:rtl"><div style="width: 100%;height: 41px;"><a style="margin-right: 5px;line-height: 25px;font-family: \'B Nazanin\';font-weight: 600;font-size: 18px" >'+title+'</a></div><div style="width: 100%;height: 25px;" id='+id+'><a style="margin-right: 5px;line-height: 20px;font-family: \'B Nazanin\';font-weight: 600;font-size: 18px">تعداد:<span style="float: none" id="tedad">1</span></a><a style="margin-left: 5px;line-height: 20px; float: left;font-family: \'B Nazanin\';font-weight: 600;font-size: 18px">قیمت واحد: <span style="float: none" id="costofproduct">'+cost1+'</span> </a></div></li><li id='+id+' style="width: 50px;height: 70px;border-right: 1px solid black"><img id="removebasket" src="img/delet.png" alt="" style="width: 30px;height: 30px;margin-top: 18px;margin-left: 10px;float: left"></li></ul>')
                }

                removefrombasket();
                numberofchosedproduct();
                totalprice();
                emptybasketmsg()





            })
    })




    // buypopupadding
    $("#mostsel #detectProduct .x1").click( function () {
        $("#productaddremovefrombasket").show();
        $("#productaddremovefrombasket").animate({opacity:1},700);

        $("#darkpage").show();
        $("#darkpage").animate({opacity:0.6},700);



        id=$(this).attr('id');

        var title='';

        var li=$(this).parents('li');

        title=li.find("#title").html();

        $.ajax({
            type:'post',
            url:'',
            data:{}

        })
            .done(function () {
                $("#addtitle").html(title);

            })

    })
    $("#darkpage").click(function () {

        $("#productaddremovefrombasket").animate({opacity:0},700,function(){$("#productaddremovefrombasket").hide();});
        $("#darkpage").animate({opacity:0},700,function(){$("#darkpage").hide();});


    })
    $("#closeimg").click(function () {

        $("#productaddremovefrombasket").animate({opacity:0},700,function(){$("#productaddremovefrombasket").hide();});
        $("#darkpage").animate({opacity:0},700,function(){$("#darkpage").hide();});


    })
    $("#edamekharid").click(function () {

        $("#productaddremovefrombasket").animate({opacity:0},700,function(){$("#productaddremovefrombasket").hide();});
        $("#darkpage").animate({opacity:0},700,function(){$("#darkpage").hide();});


    })


    // end buypopup

    // buypopupremoving

    $("#buybasket #removebasket").click(function () {
        $("#productremovefrombasket").show();
        $("#productremovefrombasket").animate({opacity:1},700);

        $("#darkpage").show();
        $("#darkpage").animate({opacity:0.6},700);

    })
    $("#closeimgdelet").click(function () {

        $("#productremovefrombasket").animate({opacity:0},700,function(){$("#productremovefrombasket").hide();});


    })

    // end buypopupremoving

</script>