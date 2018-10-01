<?php
session_start();


include ('sqlinjectioncheck.php');

if (!isset($_SESSION['email'])){
    header('location:loginPage.php?loginerror');
}
if (isset($_SESSION['email'])) {


        $phonenumber = $_POST['phonenumber'];
        $phonenumber = sqlinjectioncheck($phonenumber);


        $username = $_POST['username'];
        $username = sqlinjectioncheck($username);


        if (isset($_POST['sex'])) {
            $sex = $_POST['sex'];
        } else {
            $sex = '';
        }


        $state = $_POST['state'];
        $state = sqlinjectioncheck($state);


        $city = $_POST['city'];
        $city = sqlinjectioncheck($city);
        $city = intval($city);


        $postcode = $_POST['postcode'];
        $postcode = sqlinjectioncheck($postcode);


        $postaddress = $_POST['postaddress'];
        $postaddress = sqlinjectioncheck($postaddress);



        if (isset($_POST['khabarnamehemail'])) {
            $khabarnamehemail = 1;
        } else {
            $khabarnamehemail = 0;
        }

        if (isset($_POST['khbarnamehsms'])) {
            $khbarnamehsms = 1;
        } else {
            $khbarnamehsms = 0;
        }

        $email=$_SESSION['email'];

        include('conection.php');
        $sql = "update userdata set phonenumber='".$phonenumber."',username='".$username."',sex='".$sex."',state='".$state."',city='".$city."',postcode='".$postcode."',postaddress='".$postaddress."',khabarnamehemail='".$khabarnamehemail."',khbarnamehsms='".$khbarnamehsms."' where email='$email' ";
        $stat = $db->prepare($sql);
        $stat->execute();


        header("location:userpanel.php?edited");


}
?>
<script>
    alert('new');
</script>

