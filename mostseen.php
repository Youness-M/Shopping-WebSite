<div style="width: 98%;margin: 0 auto">
    <div id="mostsel" style="margin-bottom: 20px">


        <h1>پربازدیدترین محصولات </h1>
        <ul>

            <?php
            include ('conection.php');
            $sql="select * from newproducts_tbl order by numofseen desc limit 5";
            $stat=$db->prepare($sql);
            $stat->execute();


            while ($res=$stat->fetch(PDO::FETCH_ASSOC)){

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

</div>


<?php
    include ('basketscript.php');
?>

<script>
    $("#mostsel #detectProduct").hover(function () {
        $(this).animate({opacity:0.8},500);
        $(this).addClass('borderClass');


    },function (){
        $(this).animate({opacity:0},500);
        $(this).removeClass('borderClass');

    })

</script>
