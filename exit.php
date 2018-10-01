<?php
session_start();
unset($_SESSION['email']);
setcookie('remember',1,time()-60*60,'/');

header('location:loginPage.php?exit=success');