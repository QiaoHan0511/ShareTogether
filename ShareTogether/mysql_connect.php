<?php
// $conn = new mysqli("mysql.hostinger.my", "u904205849_admin", "123456", "u904205849_odd");
// $conn = new mysqli("localhost", "root", "", "sharetogether");
$conn = new mysqli("localhost", "root", "", "share");
// $conn = new mysqli("mysql.hostinger.my", "u580622891_admin", "123456", "u580622891_share");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
