<?php
session_start();
include '../mysql_connect.php';

$groupID = $_GET["id"];
$userGroupID = $_GET["guid"];

  $result = mysqli_query($conn,"select userGroupID from groups_user where groupID = '$groupID' ");

    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $id = $row["userGroupID"];
          mysqli_query($conn, "delete from file where userGroupID = '$id' ");
          mysqli_query($conn, "delete from groups_user where userGroupID = '$id' ");
      }
    }

  mysqli_query($conn, "delete from file where userGroupID = '$userGroupID' ");
  mysqli_query($conn, "delete from groups_user where groupID = '$groupID' ");
  mysqli_query($conn, "delete from groups where ID = '$groupID' ");
  header("location: ../home.php");



 ?>
