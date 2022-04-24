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
    $email = $_POST['txtEmail'];
    $upass = $_POST['upwd'];


    $select = pg_query_params($db_conn, "SELECT * FROM users WHERE email = $1", array($email));
    $row = pg_fetch_assoc($select);
    $pwdHash = $row["upassword"];

    if(!(pg_num_rows($select) > 0)) {
        header("location: /signin.php?error=emaildoesnotexist");
        exit();
    }
    else if(!password_verify($upass, $pwdHash)){
        header("location: signin.php?error=incorrectpassword");
        exit();
    }
    else{
        session_start();
        $_SESSION["uID"] = $row["userID"];
        $_SESSION["userEmail"] = $row["email"];
        $_SESSION["firstName"] = $row["fname"];
        $_SESSION["lastName"] = $row["lname"];
        $_SESSION["type"] = $row["usertype"];
        header("location: /signin.php?error=none");
        exit();
    }
}
?>