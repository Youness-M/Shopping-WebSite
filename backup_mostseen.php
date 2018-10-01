<div style="width: 98%;margin: 0 auto">
    <div id="mostsel" style="margin-bottom: 20px">


        <h1>پربازدیدترین محصولات </h1>
        <ul>

            <?php
            include ('conection.php');
            $sql="select * from newproducts_tbl order by numofseen desc limit 10";
            $stat=$db->prepare($sql);
            $stat->execute();


            while ($res=$stat->fetch(PDO::FETCH_ASSOC)){

                if ($res['numberofproduct']==0){
                    $productstatus='ناموجود';
                    $colorstatus='#ffa500';
                    $cost='0';
                }else{
                    $productstatus='موجود';
                    $colorstatus='#36CDDF';
                    $cost=$res['cost'];

                }

                echo'<li><a href=""><img src="'.$res['img'].'" alt=""> <br />'.$res['title'].'</a>
                        <div id="detectProduct">
                            <a class="x1" href="">افزودن به سبد خرید</a>
                            <a class="x2" href="">مشاهده توضیحات</a>
                            <a class="x3" href="">محصولات مشابه</a>
        
                        </div>
        
                        <div style="width: 100%; height: 30px;margin-top: 8px;margin-bottom: 2px">
                            <span id="price">قیمت '.$cost.' تومان</span>
                            <span id="statuscase" style="background:'.$colorstatus.'">'.$productstatus.'</span>
                        </div>
                        </li>';
            }

            ?>
        </ul>



    </div>

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
