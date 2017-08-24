<?php
session_start();
include 'mysql_connect.php';

$userID = $_SESSION["userID"];


if(isset($_POST["view"]))
{

 if($_POST["view"] != '')
 {
  $update_query = "UPDATE file SET fileView='1' WHERE fileView='0' and fileConfirm='1'";
  mysqli_query($conn, $update_query);
 }

 $query_1 = "SELECT * FROM file, groups_user WHERE groups_user.userGroupID = file.userGroupID
 and fileView='0' and fileConfirm='1'and userID = '$userID'";
 $result_1 = mysqli_query($conn, $query_1);
 $count = mysqli_num_rows($result_1);
 // $data = array(
 //  'unseen_notification' => $count
 // );
 echo json_encode($count);

}
?>
