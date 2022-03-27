<?php
$hostname = "ec2-18-215-96-22.compute-1.amazonaws.com";
$dbname = "db926f75ofgha2";
$username = "glkawdwwyajxsd";
$pass = "ab13a8d4d623d059a6c6fa355da18839af9ce573edc56ae8ab09ba0b99b70a72";

// Create connection
$db_conn = pg_connect(" host = $hostname dbname = $dbname user = $username password = $pass ");
if (!$db_conn) {
    die("Connection failed");
}

if (isset($_POST['submit'])) {
    $fname = $_POST['txtFName'];
    $lname = $_POST['txtLName'];
    $email = $_POST['txtEmail'];
}
?>
