<?php

session_start();
/*$_COOKIE['user']=null;
$_COOKIE['dateOfReg']=null;
unset($_COOKIE['info']);
unset($_COOKIE['PHPSESSID']);*/
session_destroy();
unset($_SESSION['user_info']);
unset($_SESSION['user_id']);
unset($_COOKIE['id']);
unset($_COOKIE['fname']);
unset($_COOKIE['lname']);
unset($_COOKIE['data']);
unset($_COOKIE['email']);
unset($_COOKIE['auth']);
header("Location:http://my_host1.com/index.php");
?>
