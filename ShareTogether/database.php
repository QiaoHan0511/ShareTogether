<?php
include("mysql_connect.php");

$tbl_file = "CREATE TABLE IF NOT EXISTS file (
              fileID INT(11) NOT NULL AUTO_INCREMENT,
              fname VARCHAR(300) NOT NULL,
              fileName VARCHAR(60) NOT NULL,
              filePath VARCHAR(300) NOT NULL,
              fileDesc VARCHAR(300) NOT NULL,
      			  fileConfirm ENUM('0','1','2') NOT NULL,
              fileView ENUM('0','1') NOT NULL,
              PRIMARY KEY (fileID)
             )";

$query = mysqli_query($conn, $tbl_file);
if ($query === TRUE) {
	echo "<h3>file table created OK :) </h3>";
} else {
	echo "<h3>file table NOT created :( </h3>";
}
// /////////////////////////////////////////////////////////////////////////
// $tbl_userLogin = "CREATE TABLE IF NOT EXISTS user_login (
//                     userEmail VARCHAR(50) NOT NULL,
//             				userPassword VARCHAR(255) NOT NULL,
//                     PRIMARY KEY (userEmail)
//                   )";
//
// $query = mysqli_query($conn, $tbl_userLogin);
// if ($query === TRUE) {
// echo "<h3>userlogin table created OK :) </h3>";
// } else {
// echo "<h3>userlogin table NOT created :( </h3>";
// }
//
// ///////////////////////////////////////////////////////
//
// $tbl_user = "CREATE TABLE IF NOT EXISTS user (
//               userID VARCHAR(15) NOT NULL,
//       			  fullName VARCHAR(50) NOT NULL,
//       			  position VARCHAR(15) NOT NULL,
//       			  gender ENUM('m','f') NULL,
//       			  avatar VARCHAR(255) NULL,
//       			  activated ENUM('0','1') NOT NULL DEFAULT '0',
//               userEmail VARCHAR(50) NOT NULL,
//               PRIMARY KEY (userID),
// 			        UNIQUE KEY userEmail (userEmail)
//              )";
//
// $query = mysqli_query($conn, $tbl_user);
// if ($query === TRUE) {
// 	echo "<h3>user table created OK :) </h3>";
// } else {
// 	echo "<h3>user table NOT created :( </h3>";
// }
//
// ////////////////////////////////////
//
// $tbl_group = "CREATE TABLE IF NOT EXISTS group (
//                     id INT(11) NOT NULL AUTO_INCREMENT,
//                     groupName VARCHAR(60) NOT NULL,
//             				groupStatus VARCHAR(15) NOT NULL,
//                     PRIMARY KEY (id)
//                   )";
//
// $query = mysqli_query($conn, $tbl_group);
// if ($query === TRUE) {
// 	echo "<h3>group table created OK :) </h3>";
// } else {
// 	echo "<h3>group table NOT created :( </h3>";
// }
//
// ////////////////////////////////////
//
// $tbl_useroption = "CREATE TABLE IF NOT EXISTS useroption (
//                     id INT(11) NOT NULL,
//                     username VARCHAR(16) NOT NULL,
//             				background VARCHAR(255) NOT NULL,
//             				question VARCHAR(255) NULL,
//             				answer VARCHAR(255) NULL,
//                     PRIMARY KEY (id),
//                     UNIQUE KEY username (username)
//                   )";
//
// $query = mysqli_query($conn, $tbl_useroption);
// if ($query === TRUE) {
// 	echo "<h3>useroption table created OK :) </h3>";
// } else {
// 	echo "<h3>useroption table NOT created :( </h3>";
// }
//
// ////////////////////////////////////
// $tbl_friend = "CREATE TABLE IF NOT EXISTS friend (
//                 id INT(11) NOT NULL AUTO_INCREMENT,
//                 user1 VARCHAR(15) NOT NULL,
//                 user2 VARCHAR(15) NOT NULL,
//                 datemade DATETIME NOT NULL,
//                 accepted ENUM('0','1') NOT NULL DEFAULT '0',
//                 PRIMARY KEY (id)
//                 )";
//
// $query = mysqli_query($conn, $tbl_friend);
// if ($query === TRUE) {
// 	echo "<h3>friend table created OK :) </h3>";
// } else {
// 	echo "<h3>friend table NOT created :( </h3>";
// }
//
// ////////////////////////////////////
// // $tbl_blockedusers = "CREATE TABLE IF NOT EXISTS blockedusers (
// //                       id INT(11) NOT NULL AUTO_INCREMENT,
// //                       blocker VARCHAR(16) NOT NULL,
// //                       blockee VARCHAR(16) NOT NULL,
// //                       blockdate DATETIME NOT NULL,
// //                       PRIMARY KEY (id)
// //                     )";
// //
// // $query = mysqli_query($db_conx, $tbl_blockedusers);
// // if ($query === TRUE) {
// // 	echo "<h3>blockedusers table created OK :) </h3>";
// // } else {
// // 	echo "<h3>blockedusers table NOT created :( </h3>";
// // }
//
// ////////////////////////////////////
// $tbl_status = "CREATE TABLE IF NOT EXISTS status (
//                 id INT(11) NOT NULL AUTO_INCREMENT,
//                 osid INT(11) NOT NULL,
//                 account_name VARCHAR(16) NOT NULL,
//                 author VARCHAR(16) NOT NULL,
//                 type ENUM('a','b','c') NOT NULL,
//                 data TEXT NOT NULL,
//                 postdate DATETIME NOT NULL,
//                 PRIMARY KEY (id)
//                 )";
//
// $query = mysqli_query($conn, $tbl_status);
// if ($query === TRUE) {
// 	echo "<h3>status table created OK :) </h3>";
// } else {
// 	echo "<h3>status table NOT created :( </h3>";
// }
//
// ////////////////////////////////////
// $tbl_photos = "CREATE TABLE IF NOT EXISTS photos (
//                 id INT(11) NOT NULL AUTO_INCREMENT,
//                 user VARCHAR(16) NOT NULL,
//                 gallery VARCHAR(16) NOT NULL,
// 				        filename VARCHAR(255) NOT NULL,
//                 description VARCHAR(255) NULL,
//                 uploaddate DATETIME NOT NULL,
//                 PRIMARY KEY (id)
//                 )";
//
// $query = mysqli_query($conn, $tbl_photos);
// if ($query === TRUE) {
// 	echo "<h3>photos table created OK :) </h3>";
// } else {
// 	echo "<h3>photos table NOT created :( </h3>";
// }
//
// ////////////////////////////////////
// $tbl_notifications = "CREATE TABLE IF NOT EXISTS notifications (
//                       id INT(11) NOT NULL AUTO_INCREMENT,
//                       username VARCHAR(16) NOT NULL,
//                       initiator VARCHAR(16) NOT NULL,
//                       app VARCHAR(255) NOT NULL,
//                       note VARCHAR(255) NOT NULL,
//                       did_read ENUM('0','1') NOT NULL DEFAULT '0',
//                       date_time DATETIME NOT NULL,
//                       PRIMARY KEY (id)
//                       )";
//
// $query = mysqli_query($conn, $tbl_notifications);
// if ($query === TRUE) {
// 	echo "<h3>notifications table created OK :) </h3>";
// } else {
// 	echo "<h3>notifications table NOT created :( </h3>";
// }

?>
