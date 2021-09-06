<?php
session_start();
$servername = "localhost";
$username = "myuser";
$password = "1235812358";
$dbname="my_host1";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
};

// select data of this user
$email = $_POST['Login'];
$h=$_GET['h'];
$pass =(string)$_POST['Pass'];
$sql_up=mysqli_query($conn,"SELECT * FROM users where Email='$email'");

if(mysqli_num_rows($sql_up)>0) {



    $arr=$sql_up->fetch_all(MYSQLI_ASSOC);

        $mas = $arr[0];
        $name = $mas['FirstName'];
        $lname = $mas['LastName'];
        $password_hash=$mas['password'];
        $FullName = $name . ' ' . $lname;
        $id = $mas['id'];
    if(password_verify($pass,$password_hash)) {
        $sql_in = mysqli_query($conn, "INSERT INTO sign_history (Email,time,id_user) Values ('$email', NOW(),'$id') ");

        $sql_up_his = mysqli_query($conn, "SELECT users.id,users.FirstName ,users.LastName, sign_history.time
                                                FROM users
                                                LEFT JOIN sign_history ON users.id=sign_history.id_user
                                                HAVING users.id='$id'");

        $count = $sql_up_his->num_rows;
        $data = $sql_up_his->fetch_all(MYSQLI_ASSOC);
        $names = '';
        $time = '';
        foreach ($data as $row) {
            $names = $names . ',' . $row['FirstName'] . ' ' . $row['LastName'];
            $time = $time . ',' . $row['time'];
        }
        setcookie('User', $email, time() + 300);

        header("Location:http://my_host1.com/info_page.php?txt=$FullName&count=$count&names=$names&times=$time");
        exit;
    }else{
        header("Location:http://my_host1.com/index.php?txt=Wrong password or email!&col=red");
        $_SESSION['count'] = 0;
        die();
    }
}else {


    header("Location:http://my_host1.com/index.php?txt=Wrong password or email!&col=red");
    $_SESSION['count'] = 0;
    die();


}
$conn->close();
?>