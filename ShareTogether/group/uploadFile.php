<?php
session_start();
include '../mysql_connect.php';

if(isset($_POST["btnUpload"])){

  $groupName = $_POST["gName"];
  $fileDesc = $_POST["fileDesc"];
  $fileName = $_POST["fileName"];



  $acceptable = array(
          'application/msword',
          'application/vnd.ms-excel',
          'application/vnd.ms-powerpoint',
          'application/pdf',
          'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
          'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
          'application/vnd.openxmlformats-officedocument.presentationml.presentation',
          'image/jpeg',
          'image/jpg',
          'image/gif',
          'image/png'
      );



//
//   if ($_FILES["file"]["size"] < 1000000) {
//     echo '<script language="javascript">';
//     echo 'alert("message successfully sent")';
//     echo '</script>';
    // header("Location: shareGroup.php");
    // echo '<a href="#" onclick="alert("Hello, World!"); return false;">';

if(!in_array($_FILES["file"]["type"], $acceptable) || !($_FILES["file"]["size"] < 2000000)){

      $_SESSION["groupName"] = $groupName;

      echo '<script>';
      echo 'alert("Invalid file type or file size.");';
      echo 'window.location.href="shareGroup.php";';
      echo '</script>';



  }else{


    $fname = $_FILES["file"]["name"];
    $fname = mt_rand(100000,999999).$fname;
    $filePath = "./uploads/".$fname;
    move_uploaded_file($_FILES["file"]["tmp_name"], $filePath);

    $result = mysqli_query($conn, "select * from groups where groupName= '$groupName'");
    $row = mysqli_fetch_row($result);
    $groupID = $row[0];
    $userID = $_SESSION["userID"];
    $result2 = mysqli_query($conn, "select * from groups_user where groupID = '$groupID' && userID ='$userID' ");
    $row2 = mysqli_fetch_row($result2);
    $userGroupID = $row2[0];
    $groupPosition = $row2[3];


    if ($groupPosition == "ADMIN") {
      $query = "INSERT INTO file (fname, fileName, filePath, fileDesc, fileConfirm, dateTime, userGroupID, fileView)
      VALUES('$fname', '$fileName', '$filePath', '$fileDesc', '1', now(), '$userGroupID', '1')";

          if ($conn->query($query) === TRUE)
          {
              $_SESSION["groupName"] = $groupName;
              // $message = "File uploaded!";
              // echo "<script type='text/javascript'>alert('$message');</script>";
              header("Location: shareGroup.php");

          }else {
            echo "Error: " . $query . "<br>" . $conn->error;
          }

    }else {
      $query1 = "INSERT INTO file (fname, fileName, filePath, fileDesc, fileConfirm, dateTime, userGroupID, fileView)
      VALUES('$fname', '$fileName', '$filePath', '$fileDesc', '0', now(), '$userGroupID', '0')";

          if ($conn->query($query1) === TRUE)
          {
              $_SESSION["groupName"] = $groupName;
              // echo "New record created successfully";
              // $message = "successful!";
              header("Location: shareGroup.php");
              // echo "<script type='text/javascript'>alert('$message');</script>";

          }else {
            echo "Error: " . $query1 . "<br>" . $conn->error;
          }

    }




  }



}


 ?>
