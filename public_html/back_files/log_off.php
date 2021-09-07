<?php

session_start();
/*$_COOKIE['user']=null;
$_COOKIE['dateOfReg']=null;
unset($_COOKIE['info']);
unset($_COOKIE['PHPSESSID']);*/
session_destroy();
unset($_SESSION['user_info']);
unset($_SESSION['user_id']);

header("Location:http://my_host1.com/index.php");
?>
