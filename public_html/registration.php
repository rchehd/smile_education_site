<?php
$txt='Sign up for free';
$col='black';
if(!empty($_GET['txt'])){
    $txt=$_GET['txt'];
}
if(!empty($_GET['col'])){
    $col=$_GET['col'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style.css">
    <title>Welcome!</title>
</head>
<body>


<div class="flname">
    <input class="submit2" type="submit" value="Sign In" onclick="location.href='index.html'"  >
    <input class="submit1" type="submit" value="Sign Up"  onclick="location.href='registration.php'"  ><br></br>
</div>
<div id="f2">
    <form class="register" method="POST" action="register.php">
        <div class="column">
            <!--
            <h2 class="hname" style="color:?php '$col'?>">?php echo $txt ?></h2> -->
            <?php echo "<h2 class='hname' style='color:$col'>$txt</h2>" ?>
            <input name="FirstName" type="text" placeholder="First name*" required  >
            <input name="LastName" type="text" placeholder="Last name*" required ><br></br>
        </div>
        <div class="column">
            <input type="email" placeholder="Email*" required name="EnteredEmail"><br></br>
        </div>
        <div class="column">
            <input type="password" placeholder="Password*" required name="EnteredPass"><br></br>
        </div>
        <div>
            <input type="submit" value="Sign Up" class="submit" name="RegUsr" >
        </div>
    </form>
</div>


</body>
</html>