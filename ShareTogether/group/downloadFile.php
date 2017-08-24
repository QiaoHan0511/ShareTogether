<?php
session_start();
include '../mysql_connect.php';

// $id = $_GET['id'];
//
// $result = mysqli_query($conn, "select * from file where fileID= '$id' ");
//
// while($row = mysqli_fetch_assoc($result)) {
//
//     $filePath = $row["filePath"];
//     header('content-Disposition: attachment; filename = '.$filePath.'');
//     header('content-type:application/octent-strem');
//     header('content-length='.filesize($filePath));
//     readfile($filePath);
// }

$id = $_GET['id'];

$result = mysqli_query($conn, "select * from file where fileID= '$id' ");

while($row = mysqli_fetch_assoc($result)) {

    $fname = $row["fname"];
    $fileName = basename($fname);
    $filePath = $row["filePath"];
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename = $fileName");
    header("Content-Type:application/zip");
    header("Content-Transfer-Encoding: binary");
    readfile($filePath);
    exit;
}


 ?>
