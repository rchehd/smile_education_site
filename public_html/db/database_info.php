<?php
const SERVERNAME = "localhost";
const USERNAME = "myuser";
const PASSWORD = "1235812358";
const DBNAME="my_host1";

// Create connection
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD,DBNAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
};

?>
