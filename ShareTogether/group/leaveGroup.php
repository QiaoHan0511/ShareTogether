<?php
session_start();
include '../mysql_connect.php';

$groupID = $_GET["id"];
$userGroupID = $_GET["guid"];

mysqli_query($conn, "delete from file where userGroupID = '$userGroupID'");
mysqli_query($conn, "delete from groups_user where userGroupID = '$userGroupID'");

header("location: ../home.php");

 ?>
