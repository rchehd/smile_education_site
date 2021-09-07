<?php
include '../db/database_info.php';
include '../db/lib.php';
// select data of this user
$email = $_POST['Login'];
$h=$_GET['h'];
$pass =$_POST['Pass'];


if(isUser($email)) {
    $password_hash=getUserHash($email);
    if(password_verify($pass,$password_hash)) {
        session_start();
        $id=getIdUser($email);
        $date=getDateUser($email);
        $info=getUserInfo($email);
        $_SESSION['auth']=true;
        $_SESSION['user_info']=$info;
        $_SESSION['id']=$id;
        $_SESSION['date']=$date;
        $mas=explode(',',$info);
        /*setcookie("userID",$id);
        setcookie("dateOfReg",$mas[3]);
        setcookie("inform",$info);*/
        header("Location:http://my_host1.com/my_profile.php?txt=$info");
        //("Location:http://my_host1.com/info_page.php?txt=$FullName&count=$count&names=$names&times=$time");
        exit;
    }else{
        header("Location:http://my_host1.com/index.php?txt=Wrong password or email!&col=red");

        die();
    }
}else {
    header("Location:http://my_host1.com/index.php?txt=Wrong password or email!&col=red");

    die();
}

?>