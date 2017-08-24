<?php
session_start();
include '../mysql_connect.php';

$fileID = $_POST["fileID"];

if(isset($_POST['btnApproveFile'])){

  mysqli_query($conn, "update file set fileConfirm='1', approveDate=now() where fileID = '$fileID'");
  header("location: ../home.php");

}

 ?>
