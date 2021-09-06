<?php
$name='Unnamed';
$count=0;
$names=[];
$times=[];
if(!empty($_GET['txt'])){
    $name=$_GET['txt'];
}
if(!empty($_GET['count'])){
    $count=$_GET['count'];
}
if(!empty($_GET['names'])){
    $names1=$_GET['names'];
}
if(!empty($_GET['times'])){
    $times1=$_GET['times'];
}
$_GET = array();
//do array from string
$names=explode(',',$names1);
$times=explode(',',$times1);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Info</title>
</head>
<body>
    <?php echo "<h2>Welcome $name!</h2>"?>
    <table >
        <thead style="background: #fc0">
        <tr >
            <td>Your name         </td>
            <td>Date, time to sign</td>
        </tr>
        </thead>
            <?php
            for($i=0;$i<count($names);$i++) {
                echo "<tbody style='background: #ccc'><tr><td>$names[$i]</td><td>$times[$i]</td></tr></tbody>";
            } ?>
    </table><br>


    <a href='index.php'>Exit to main page</a>
</body>
</html>
