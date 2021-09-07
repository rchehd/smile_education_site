<?php
include 'database_info.php';

function registerUser($firstname,$lastName,$email,$passHash){
    global $conn;
    $sql = "INSERT INTO users (FirstName, LastName, Email, password,DateOfReg) 
        " . "VALUES ('$firstname','$lastName','$email','$passHash',NOW())";

    return $conn->query($sql) ;
    $conn->close();
 }
 function isUser($email){
     global $conn;
     $sql=mysqli_query($conn,"SELECT * FROM users where Email='$email'");
     if(mysqli_num_rows($sql)>0) {
         return true;
     }else{
         return  false;
     }
     $conn->close();
 }
 function writeLoginHistory($email,$id){
     global $conn;
     $sql_in = mysqli_query($conn, "INSERT INTO sign_history (Email,time,id_user) Values ('$email', NOW(),'$id') ");
     $conn->close();
 }
 function getUserHash($email){
     global $conn;
     $sql_up = mysqli_query($conn, "SELECT * FROM users where Email='$email'");
     if (mysqli_num_rows($sql_up) > 0) {
         $arr = $sql_up->fetch_all(MYSQLI_ASSOC);
         $mas = $arr[0];
         return $mas['password'];
     }
     $conn->close();
 }
 function getUserInfo($email){
     global $conn;
     $sql_info = mysqli_query($conn, "SELECT FirstName,LastName,Email,DateOfReg FROM users WHERE Email='$email'");
     $data = $sql_info->fetch_all(MYSQLI_ASSOC);
     $row=$data[0];
     $info=$row['FirstName'] . ',' . $row['LastName']. ',' . $row['Email']. ',' . $row['DateOfReg'];
     return $info;
     $conn->close();
 }
function updateUserInfo($firstname,$lastName,$email,$newpass,$id){
    global $conn;
    $sql = mysqli_query($conn, "UPDATE users SET FirstName='$firstname',LastName='$lastName',Email='$email',Password='$newpass' WHERE id='$id'");
    $conn->close();
}
function getIdUser($email){
    global $conn;
    $sql_info = mysqli_query($conn, "SELECT id FROM users WHERE Email='$email'");
    $data = $sql_info->fetch_all(MYSQLI_ASSOC);
    $row=$data[0];
    $info=$row['id'];
    return $info;
    $conn->close();
}
function isFreeEmail($email,$id){
    global $conn;
    $sql= mysqli_query($conn, "SELECT id FROM users WHERE Email='$email' and id!=$id");
    if(mysqli_num_rows($sql)>0) {
        return false;
    }else{
        return  true;
    }
}
function getUserHashId($id){
    global $conn;
    $sql_up = mysqli_query($conn, "SELECT * FROM users where id='$id'");
    if (mysqli_num_rows($sql_up) > 0) {
        $arr = $sql_up->fetch_all(MYSQLI_ASSOC);
        $mas = $arr[0];
        return $mas['password'];
    }
    $conn->close();
}
?>
