<?php
$email=$_SESSION['email'];
 if (isset($_POST['btn'])){

     $oldpassword=$_POST['oldpassword'];
     $newpassword=$_POST['newpassword'];

     $oldpassword=md5($oldpassword);
     $newpassword=md5($newpassword);

     include ('conection.php');
     $sql="select * from userdata where email='".$_SESSION['email']."' and password='".$oldpassword."'";
     $stat=$db->prepare($sql);
     $stat->execute();
     $num=$stat->rowCount();
     if ($num==1){

         $sql="update userdata set password='".$newpassword."' where email='$email'";
         $stat=$db->prepare($sql);
         $stat->execute();

     }

 }
?>
<form action="" method="post" >
    <div style="width: 815px;min-height: 492px;box-shadow: 1px 1px 4px gray ;float: left;
    	margin-bottom: 20px;background:white;border-radius: 4px">
       <div style="width: 500px;margin: 0 auto;padding-top: 50px">

           <div id="registersection"><span id="registersectionspan">رمز عبور قدیمی : <b style="color: red">*</b></span>
               <input style="direction: ltr" type="text" name="oldpassword" >
           </div>


           <div id="registersection"><span id="registersectionspan">رمز عبور جدید : <b style="color: red">*</b></span>
               <input style="direction: ltr" type="password" name="newpassword" >

           </div>




           <div id="registersection">
               <input type="submit" name="btn" value="تغییر رمز" style="width: 254px;float: right;margin-right: 155px">
           </div>
       </div>




        <br>
        <br>

    </div>

</form>

