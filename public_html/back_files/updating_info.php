<?php
include '../classes/User.php';
include '../classes/DBC.php';
session_start();
$DB= new DBC();
$currentUser=new User(
    htmlspecialchars($_COOKIE['fname']),
    htmlspecialchars($_COOKIE['lname']),
    htmlspecialchars($_COOKIE['email']),
    $_POST['CurrentPass']);

$newData=[
    fname=>htmlspecialchars($_POST['newFirstName']),
    lname=>htmlspecialchars($_POST['newLastName']),
    email=>htmlspecialchars($_POST['newEmail']),
    pass=>$_POST['NewPass']
];

$valid=$DB->validateUser($currentUser);
if($valid){
    $result=$DB->updateUser($currentUser,$newData);

    setcookie('email',$newData['email']);
    setcookie('fname',$newData['fname']);
    setcookie('lname',$newData['lname']);

    $info = $newData['fname'].','.$newData['lname'].','.$newData['email'].','.$_COOKIE['date'];
    header("Location:http://my_host1.com/my_profile.php?txt=$info");
}else{
    $info = $newData['fname'].','.$newData['lname'].','.$newData['email'].','.$_COOKIE['date'];
    header("Location:http://my_host1.com/update_info.php?head=Wrong current password!&txt=$info");
    exit;
}


?>