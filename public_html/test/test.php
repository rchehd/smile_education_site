<?php
include '../classes/User.php';
$dbParams=[
    SERVERNAME =>"localhost",
    USERNAME =>"myuser",
    PASSWORD =>"1235812358",
    DBNAME =>"my_host1"
];
$dbconn=null;

function con()
{
    global $dbconn;
    global $dbParams;
    $server = $dbParams['SERVERNAME'];
    $dbname = $dbParams['DBNAME'];
    $username = $dbParams['USERNAME'];
    $pass = $dbParams['PASSWORD'];
    $dbconn = new PDO("mysql:host=$server;dbname=$dbname", $username, $pass);
}

    con();
$email='n@mail.com';
$pass=123;
$User=new User("Unknown","Unknown",$email,$pass);
function validateUser($user){
    global  $dbconn;
    $email=$user->getUserEmail();
    $pass=$user->getUserPass();


    $sql = 'SELECT * FROM users WHERE Email= :email';
    $stm = $dbconn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stm->execute(array(':email' => $email));
    $res=$stm->fetchAll(PDO::FETCH_ASSOC);
    $passHash=$res[0]['Password'];
    $id=$res[0]['id'];
    $fname=$res[0]['FistName'];
    $lname=$res[0]['LastName'];
    $dt=$res[0]['DateOfReg'];
    $valid=password_verify($pass,$passHash);
    if($valid) {
        $user->setUserFName($fname);
        $user->setUserLName($lname);
        $user->setDateOfReg($dt);
        $user->setId($id);
        return true;
    }else{
        return  false;
    }
}
$res=validateUser($User);
print $res;
?>