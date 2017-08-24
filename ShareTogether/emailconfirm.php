<?php
include 'mysql_connect.php';

$userID = $_GET['userID'];
$code = $_GET['code'];

$query = mysqli_query($conn,"select * from user where userID ='$userID'and confirmCode = '$code';");
while($row = mysqli_fetch_assoc($query))
{
    $db_code = $row['confirmCode'];
}

if($code == $db_code)
{
    mysqli_query($conn, "update user set activated='1', confirmCode='0' where userID = '$userID'");
    header("location: index.html");
}
else
{
    echo 'UserID and code not match';
}
?>
