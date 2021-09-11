<!--get values of $_GET array-->
<?php
session_start();
if($_SESSION["auth"]==true){
    $info=$_SESSION['user_info'];
    header("Location:http://my_host1.com/my_profile.php?txt=$info");
    exit;
}

$txt='Sign In for Free';
$col='white';
if(!empty($_GET['txt'])){
    $txt=$_GET['txt'];
}
if(!empty($_GET['col'])){
    $col=$_GET['col'];
}
if(!empty($_GET['log'])){
    $login=$_GET['log'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta  charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome!</title>
</head>
<body >

<div class="main" >
    <div class="flname" >
        <input class="submit2" type="submit" value="Sign Up"  onclick="location.href='registration.php'"  >
        <input class="submit1" type="submit" value="Log In" onclick="location.href='index.php'"  ><br></br>
    </div>

    <div id="f1" >
        <form class="sign_in" method="POST" action="back_files/validation.php">
            <div class="column">
                <?php  echo "<h2 class='hname' style='color:$col; font-weight: lighter' >$txt</h2>";
                $txt='Sign in for free';
                $col='black';?>
                <?php echo "<input  type='email' placeholder='Email*' required name='Login'  value='$login'><br></br>"?>
            </div>
            <div class="column">
                <input type="password" placeholder="Password*" required name="Pass" ><br></br>
            </div>
            <div>
                <input class="submit" type="submit" value="LOG IN" name="SignUsr" >
            </div>
        </form>
    </div>
</div>
</body>
</html>

