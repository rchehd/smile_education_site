<!--get values from $_GET-->
<?php
$txt='Sign Up for Free';
$col='white';
$dFname=null;
$dLname=null;
if(!empty($_GET['txt'])){
    $txt=$_GET['txt'];
}
if(!empty($_GET['col'])){
    $col=$_GET['col'];
}
if(!empty($_GET['dFname'])){
    $dFname=$_GET['dFname'];
}
if(!empty($_GET['dLname'])){
    $dLname=$_GET['dLname'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/style.css">
    <title>Welcome!</title>
</head>
<body>
<div class="main" >

    <div id="f2">
        <form class="register" method="POST" action="back_files/register.php">
            <div class="column">
                <input class="submit1" type="submit" value="Sign Up"  onclick="location.href='registration.php'"  >
                <input class="submit2" type="submit" value="Log In" onclick="location.href='index.php'"  ><br></br>
                <?php echo "<h2 class='hname' style='color:$col;font-weight: lighter'>$txt</h2>" ?>
                <?php echo "<input name='FirstName' type='text' placeholder='First Name*' required  value='$dFname'>"?>
                <?php echo "<input name='LastName' type='text' placeholder='Last Name*' required value='$dLname' ><br></br>"?>

            </div>
            <div class="column">
                <input type="email" placeholder="Email Adress*" required name="EnteredEmail"><br></br>
            </div>
            <div class="column">
                <input type="password" placeholder="Set A Password*" required name="EnteredPass"><br></br>
            </div>
            <div>
                <input type="submit" value="GET STARTED" class="submit" name="RegUsr" >
            </div>
        </form>
    </div>
</div>

</body>

</html>