<?php
include '../db/database_info.php';
include '../db/lib.php';
//read global array '$_POST'
function GetDataUser($key){
    $arr=[
        firstname=>htmlspecialchars($_POST['FirstName']),
        lastname=>htmlspecialchars($_POST['LastName']),
        email=>htmlspecialchars($_POST['EnteredEmail']),
        pass=>$_POST['EnteredPass'],
        hash=>password_hash($_POST['EnteredPass'],PASSWORD_DEFAULT)
    ];
    return $arr[$key];
}
$firstname=GetDataUser(firstname);
$lastname = GetDataUser(lastname);
$email = GetDataUser(email);
$password =GetDataUser(hash);

if(isUser($email)>0) {
        header("Location:http://my_host1.com/registration.php?txt=Email is already Exists! Please try another&col=red&dFname=$firstname&dLname=$lastname",);
        exit;
    }

if (registerUser($firstname,$lastname,$email,$password)) {
    header("Location:http://my_host1.com/index.php?txt=You are successfully registered!&col=green&log=$email");
    die();
}


?>




