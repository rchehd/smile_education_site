<?php

session_start();
if($_SESSION["auth"]!=true){
    header("Location:http://my_host1.com/index.php");
    exit;
}
if(!empty($_GET['txt'])){
    $str=$_GET['txt'];
}else{
    $str="";
}
if($str){
    $info=explode(',',$str);
}else{
    $info=["unnamed","unnamed","unnamed","unnamed"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/style.css">
    <title>Data change</title>

<body>
<div class="updater" >

    <div id="f2">
        <form  method="POST" action="back_files/updating_info.php">
            <div class="column">

                <?php echo "<h2 class='hname' style='color:$col;font-weight: lighter'>Change your information</h2>" ?>
                <div><label>First name</label><br></br></div>
                <div>
                    <?php echo "<input style='width: 86%' name='newFirstName' type='text'  required  value='$info[0]'><br></br>"?>
                </div>
                <div><label>Last name</label><br></br></div>
                <div>
                    <?php echo "<input style='width: 86%' name='newLastName' type='text'  required value='$info[1]' ><br></br>"?>
                </div>
                <div>
                    <label>Email</label><br></br>
                </div>
                <div>
                    <?php echo "<input name='newEmail' type='email' required value='$info[2]' ><br></br>"?>
                </div>
                <div>
                    <label>Current password</label><br></br>
                </div>
                <div>
                    <?php echo "<input name='CurrentPass' type='password' placeholder='Set A Current password*'  required  ><br></br>"?>
                </div>
                <div>
                    <label>New password</label><br></br>
                </div>
                <div>
                    <?php echo "<input name='NewPass' type='password' placeholder='Set A New password*' required  ><br></br>"?>
                </div>

            </div>

            <div>
                <input type="submit" value="UPDATE INFO" class="submit" name="Update" >
            </div>
        </form>
    </div>
</div>

</body>

</html>
