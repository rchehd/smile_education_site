<?php

session_start();

if($_SESSION["auth"]!=true){
    header("Location:http://my_host1.com/index.php");
    exit;
}

if(!empty($_GET['txt'])){
    $str=$_GET['txt'];
}elseif(isset($_SESSION["user_info"])){
    $str=$_SESSION["user_info"];
}else{
    $str="";
}
if($str){
    $info=explode(',',$str);
}else{
    $info=["","","",""];
}

$FullName=$info[0].' '.$info[1];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo "<title>Hi $info[0]!</title>"?>
</head>
<body>
<h2>Information about you</h2>
<table class="blueTable" >
    <thead >
    <tr class="head_table">
        <td>Character</td>
        <td>Values</td>
    </tr>
    </thead>
    <?php
        echo "<tbody ><tr><td>Fisrt Name</td><td >$info[0]</td></tr></tbody>";
        echo "<tbody ><tr><td>Last Name</td><td>$info[1]</td></tr></tbody>";
        echo "<tbody ><tr><td>Email Adress</td><td>$info[2]</td></tr></tbody>";
        echo "<tbody ><tr><td>Date of registration</td><td>$info[3]</td></tr></tbody>";
    ?>
</table><br>

<div style="margin-left: 1%">
    <?php echo "<a href='http://my_host1.com/update_info.php?txt=$str'>Change my information</a><br></br>" ?>
</div>
<div style="margin-left: 1%">
    <a style="background-color: firebrick" href='http://my_host1.com/back_files/log_off.php'>Exit</a>
</div>

</body>
</html>
