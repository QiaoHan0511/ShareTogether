<?php
// $conn = new mysqli("mysql.hostinger.my", "u904205849_admin", "123456", "u904205849_odd");
// $conn = new mysqli("localhost", "root", "", "sharetogether");
$connU = new mysqli("localhost", "root", "", "utemdatabase");
// $connU = new mysqli("mysql.hostinger.my", "u580622891_utem", "123456", "u580622891_utem");

if ($connU->connect_error) {
    die("Connection failed: " . $connU->connect_error);
}
?>
