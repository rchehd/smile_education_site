<?php
include '../classes/User.php';
include '../classes/DBC.php';
// select data of this user
$email = $_POST['Login'];
$h=$_GET['h'];
$pass =$_POST['Pass'];
$User=new User("Unknown","Unknown",$email,$pass);
$DB=new DBC();
$valid=$DB->validateUser($User);

if($valid) {
        session_start();
        $id=$User->getId();
        $email=$User->getUserEmail();
        $date=$User->getDateOfReg();
        $fname=$User->getUserFName();
        $lname=$User->getUserLName();
        $info=$fname.','.$lname.','.$email.','.$date;
        $_SESSION['auth']=true;
        $_SESSION['user_info']=$info;
        $_SESSION['id']=$id;
        $_SESSION['date']=$date;
        setcookie('auth',true,time()+3600);
        setcookie('id',$id);
        setcookie('email',$email);
        setcookie('fname',$fname);
        setcookie('lname',$lname);
        setcookie('date',$date);
        //$mas=explode(',',$info);
        header("Location:http://my_host1.com/my_profile.php?txt=$info");
        //("Location:http://my_host1.com/info_page.php?txt=$FullName&count=$count&names=$names&times=$time");
        exit;
    }else {
    header("Location:http://my_host1.com/index.php?txt=Wrong password or email!&col=red");

    die();

    }

?>