<!--get values of $_GET array-->
<?php
session_start();
if(!isset($_SESSION)){
    $_SESSION['count']=0;

}else{
    $_SESSION['count']++;
}

$txt='Sign in for free';
$col='black';
$login=null;
if ($_SESSION['count']<2) {
    if (!empty($_GET['txt'])) {
        $txt = $_GET['txt'];
    }
    if (!empty($_GET['col'])) {
        $col = $_GET['col'];
    }
    if (!empty($_GET['log'])) {
        $login = $_GET['log'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta  charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Welcome!</title>
</head>
<body >

<div >
    <div class="flname" >
        <input class="submit1" type="submit" value="Sign In" onclick="location.href='index.php'"  >
        <input class="submit2" type="submit" value="Sign Up"  onclick="location.href='registration.php'"  ><br></br>
    </div>

    <div id="f1" >
        <form class="sign_in" method="POST" action="validation.php">
            <div class="column">
                <?php  echo "<h2 class='hname' style='color:$col' >$txt</h2>";
                $txt='Sign in for free';
                $col='black';?>
                <?php echo "<input  type='email' placeholder='Email*' required name='Login'  value='$login'><br></br>"?>
            </div>
            <div class="column">
                <input type="password" placeholder="Password*" required name="Pass" >
            </div>
            <div>
                <input class="submit" type="submit" value="Sign In" name="SignUsr" >
            </div>
        </form>
    </div>
</div>
</body>
</html>

