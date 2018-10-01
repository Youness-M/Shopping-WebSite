<?php
include ('conection.php');
$sql="select * from userdata where email='".$_SESSION['email']."'";
$stat=$db->prepare($sql);
$stat->execute();
$res=$stat->fetch(PDO::FETCH_ASSOC);
$id=$res['id'];

$sqlmsg="select * from messagestbl where forwhichuser='".$id."' order by id desc ";
$statmsg=$db->prepare($sqlmsg);
$statmsg->execute();
$numbermsg=$statmsg->rowCount();
$numberofmsginpage=7;

$numberofpage=ceil($numbermsg/$numberofmsginpage);


?>


<form action="" method="post" >
    <div style="width: 815px;min-height: 492px;box-shadow: 1px 1px 4px gray ;float: left;
    	margin-bottom: 20px;background:white;border-radius: 4px">
        <div style="width: 100%;margin: 0 auto;padding-top: 30px">

            <div id="registersection" style="width:98%;margin: 0 auto;">

                <table  style=" width: 100%;direction: rtl;border: none;	border-collapse: collapse;border-bottom: 1px solid gray;">

                    <thead>
                        <tr >
                            <th style="width: 50px">ردیف</th>
                            <th style="width: 300px">عنوان پیام</th>
                            <th>تاریخ ارسال</th>
                            <th>وضعیت</th>
                            <th>حذف</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php
                    $j=0;
                    $m=1;
                    if (isset($_GET['pagenumber'])){
                        $pagenumber=$_GET['pagenumber'];
                    }else{
                        $pagenumber=1;
                    }
                    $start=$numberofmsginpage*($pagenumber-1)+1;
                    $end=$numberofmsginpage*$pagenumber;

                        while ($resmsg=$statmsg->fetch(PDO::FETCH_ASSOC)){

                            $j=$j+1;
                            if ($m>=$start and $m<=$end){


                            if ($resmsg['status']==0){$status='خوانده نشده';};
                            if ($resmsg['status']==1){$status='خوانده شده';};
                    ?>
                        <tr>
                            <td><?php echo $j;?></td>
                            <td><a id="mainmsg" href="userpanel.php?ithem=messages&idmsg=<?php echo $resmsg['id']; ?>&pagenumber=<?php echo $pagenumber; ?>"><?php echo $resmsg['title'];?></a></td>
                            <td><?php echo $resmsg['sendingtime'];?></td>
                            <td id="msgstatus"><?php echo $status;?></td>
                            <td>  <a id="deletmsg" href="deletmessages.php?id=<?php echo $resmsg['id']; ?>&pagenumber=<?php echo $pagenumber; ?>">
                                    <img src="img/delet.png" alt=""> </a></td>
                        </tr>

                    <?php }
                        $m++;
                        }?>

                    </tbody>
                </table>

            </div>

            <?php

                @$idmsg=$_GET['idmsg'];


                $sqlnew="update messagestbl set status=1 where id='$idmsg'";
                $statnew=$db->prepare($sqlnew);
                $statnew->execute();


                $sqlmsg1="select * from messagestbl where id='$idmsg'";
                $statmsg1=$db->prepare($sqlmsg1);
                $statmsg1->execute();
                $resultformainmsg=$statmsg1->fetch(PDO::FETCH_ASSOC);

                if($idmsg>0){
                    echo' <div id="showusermessag" style="display: block!important;cursor: pointer"><a href="userpanel.php?ithem=messages&pagenumber='.$pagenumber.'"><img id="closemsg" src="img/close.png" alt="close"></a> 
                            <span>'.$resultformainmsg['mainmsg'].' </span></div>';

                }
            ?>

            <div id="pager" style="width: 100%;height: 30px;position: absolute;top: 590px;left: 150px;">

                <?php
                    for($i=1;$i<=$numberofpage;$i++){
                        if ($i==$pagenumber){$background="background:gray";}
                        else{$background="";}

                   echo '<a style="'.$background.'" href="userpanel.php?ithem=messages&pagenumber='.$i.'">'.$i.'</a>';
                }?>


            </div>

        </div>





        <br>
        <br>

    </div>




</form>




<script >

      var isread=0;
      isread= '<?php echo $_GET['idmsg']?>';
      alert(isread);



        $("#closemsg").click(function () {
            $("#showusermessag").hide();


        })



      $("#mainmsg").click(function () {

          <?php
          $sqlnew="update messagestbl set status=1 where id='$idmsg'";
          $statnew=$db->prepare($sqlnew);
          $statnew->execute();
          ?>
      })
          // $("#msgstatus").html('خوانده شده');

        //     $.ajax({
        //
        //         type:'post',
        //         async:false,
        //         url:'updatethestatusofmsg.php',
        //         data:{isopened:isread}
        //
        //     })
        //         .done(function (msg) {
        //             alert(msg);
        //
        //
        //             $("#msgstatus").html('خوانده شده');
        //
        //         })
        //
        // })



</script>
