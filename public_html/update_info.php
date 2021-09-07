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

                <?php echo "<h2 class='hname' style='color:white;font-weight: bold'>Change your information</h2>" ?>
                <div><label class='profilelabel'>First name</label></div>
                <div>
                    <?php echo "<input style='width: 70%;height: 8px' name='newFirstName' type='text'  required  value='$info[0]'>"?>
                </div>
                <div><label class='profilelabel'>Last name</label></div>
                <div>
                    <?php echo "<input style='width: 70%;height: 8px' name='newLastName' type='text'  required value='$info[1]' >"?>
                </div>
                <div>
                    <label class='profilelabel'>Email</label>
                </div>
                <div>
                    <?php echo "<input style='height: 8px;width: 70%' name='newEmail' type='email' required value='$info[2]' >"?>
                </div>
                <div>
                    <label class='profilelabel' style='height: 8px;width: 70%' >Current password</label>
                </div>
                <div>
                    <?php echo "<input style='height: 8px;width: 70%' name='CurrentPass' type='password' placeholder='Set A Current password*'  required  >"?>
                </div>
                <div>
                    <label  class='profilelabel' style='height: 8px;width: 70%';>New password</label>
                </div>
                <div>
                    <?php echo "<input style='height: 8px;width: 70%' name='NewPass' type='password' placeholder='Set A New password*' required  ><br></br>"?>
                </div>

            </div>

            <div>
                <input style='width: 78%' type="submit" value="UPDATE INFO" class="submit" name="Update" >
            </div>
        </form>
    </div>
</div>

</body>

</html>
