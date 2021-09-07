<?php
include '../db/database_info.php';
include '../db/lib.php';
session_start();
function GetDataUser($key){
    $arr=[
        firstname=>htmlspecialchars($_POST['newFirstName']),
        lastname=>htmlspecialchars($_POST['newLastName']),
        email=>htmlspecialchars($_POST['newEmail']),
        currpass=>$_POST['CurrentPass'],
        newpass=>$_POST['NewPass'],
        hash=>password_hash($_POST['NewPass'],PASSWORD_DEFAULT)
    ];
    return $arr[$key];
}
$firstname=GetDataUser(firstname);
$lastname = GetDataUser(lastname);
$email = GetDataUser(email);
$currpass =GetDataUser(currpass);
if(GetDataUser(newpass)){
    $newpass =GetDataUser(hash);
}else{
    $newpass=null;
}


$id = $_SESSION['id'];
$bool=isFreeEmail($email,$id);
if($bool) {
    $password_hash = getUserHashId($id);
    if (password_verify($currpass, $password_hash)) {
        if($newpass) {
            session_start();
            updateUserInfo($firstname, $lastname, $email, $newpass, $id);
            $info = $firstname . ',' . $lastname . ',' . $email . ',' . $_SESSION['date'];
            header("Location:http://my_host1.com/my_profile.php?txt=$info");
            //("Location:http://my_host1.com/info_page.php?txt=$FullName&count=$count&names=$names&times=$time");
            exit;
        }else{
            session_start();
            $dop=password_hash($currpass,PASSWORD_DEFAULT);
            updateUserInfo($firstname, $lastname, $email, $dop, $id);
            $info = $firstname . ',' . $lastname . ',' . $email . ',' . $_SESSION['date'];
            header("Location:http://my_host1.com/my_profile.php?txt=$info");
            //("Location:http://my_host1.com/info_page.php?txt=$FullName&count=$count&names=$names&times=$time");
            exit;
        }
    }else{
        session_start();
        $info = $firstname . ',' . $lastname . ',' . $email . ',' . $_SESSION['date'];
        header("Location:http://my_host1.com/update_info.php?head=Wrong current password!&txt=$info");
        exit;
    }
}