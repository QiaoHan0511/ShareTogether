<?php
session_start();
include 'mysql_connect.php';

$fileID = $_POST["fileID"];
$reason = $_POST["reason"];

if(isset($_POST['btnDeclineR'])){

  mysqli_query($conn, "update file set fileConfirm='2', remark='$reason', approveDate=now() where fileID = '$fileID'");
  header("location: home.php");

}

 ?>
