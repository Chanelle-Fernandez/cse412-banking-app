<?php
$hostname = "ec2-44-194-92-192.compute-1.amazonaws.com";
$dbname = "dc35nfh1ras1c9";
$username = "obhuvqmvswdwgp";
$pass = "e0c12b3cf78a69fdaa45f3790d939cc0205181ce634d747be07f79cb7e130c67";

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
