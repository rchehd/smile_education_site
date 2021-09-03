<?php
session_start();
$servername = "localhost";
$username = "myuser";
$password = "1235812358";
$dbname="my_host1";


$errors = array();

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
};

//read global array '$_POST'

    $firstname= $_POST['FirstName'];
    $lastname = $_POST['LastName'];
    $email = $_POST['EnteredEmail'];
    $password =$_POST['EnteredPass'];
    $sql1=mysqli_query($conn,"SELECT * FROM users where Email='$email'");
    if(mysqli_num_rows($sql1)>0)
    {
        echo "Email Id Already Exists";
        header("Location:http://my_host1.com/registration.php?txt=Email is already Exists! Please try another&col=red&dFname=$firstname&dLname=$lastname",);

        exit;
    }
    $sql = "INSERT INTO users (FirstName, LastName, Email, password,DateOfReg) 
            "."VALUES ('$firstname','$lastname','$email','$password',NOW())";
if ($conn->query($sql) === TRUE) {
    header("Location:http://my_host1.com/index.php?txt=You are successfully registered!&col=green&log=$email",);
    die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>




