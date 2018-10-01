
<div style="width: 100%;margin: 0;padding:0;margin-top:15px; background:yellow!important;float: right">
    <div style="width: 98%;margin: 0 auto">

        <div id="topcontent" style="position: relative; float: right;">

            <div id="slid">
                <div id="slidshow" >
                    <?php
                    include ('conection.php');

                    $sql="SELECT * FROM newproducts_tbl WHERE slidsstatus=1";
                    $stat=$db->prepare($sql);
                    $stat->execute();
                    while ($res=$stat->fetch(PDO::FETCH_ASSOC)){

                        echo'<a href=""><img src="'.$res['img'].'" alt="" style="height: 340px; width: 700px"></a>';
                    }

                    ?>



                </div>
                <img id="next" src="img/prev.png" style="opacity:0;position: absolute; top:150px; right: 10px;z-index: 10; cursor: pointer;display: none" >
                <img id="prev" src="img/next.png" style="opacity:0; position: absolute; top:150px; left: 10px;z-index: 10;cursor: pointer;display: none">

            </div>



        </div>

    </div>


</div>

<script>
    $("#slidshow").cycle({
        fx:'turnRight',
        timeout:4000,
        next:'#next',
        prev:'#prev',

    })

    $("#slid").hover(function () {
        $("#next,#prev").show(0);
        $("#next,#prev").animate({opacity:1},600);

    },function () {
        $("#next,#prev").animate({opacity:0},600);
        $("#next,#prev").hide(0);

    })
</script>