<div style="width: 98%;margin: 0 auto">
    <div id="newproduct">


        <h1> <a href=""></a> محصولات جدید</h1>

        <ul>
            <?php
            include ('conection.php');

            $sql="SELECT * FROM newproducts_tbl ORDER BY id DESC LIMIT 5";
            $stat=$db->prepare($sql);
            $stat->execute();
            while ($res=$stat->fetch(PDO::FETCH_ASSOC)){
//
                echo '<li id="newproli"><a href=""><img src="'.$res['img'].'" alt=""> <br />'.$res['title'].'</a>';


                echo '<div style="width: 100%; height: 30px;margin-top: 8px;margin-bottom: 2px"></div>';
                echo '</li>';
            }

            ?>



        </ul>

    </div>


</div>


<!--<script>-->
<!--    $("#newproduct li").hover(function () {-->
<!--        $(this).addClass('borderClass');-->
<!--        // timeout:500;-->
<!---->
<!---->
<!--    },function (){-->
<!--        $(this).removeClass('borderClass');-->
<!---->
<!--    })-->
<!---->
<!--</script>-->
