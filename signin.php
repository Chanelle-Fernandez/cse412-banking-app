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

if(isset($_POST['submit'])){
    $username = $_POST['userName'];
    $password = $_POST['password'];

    $select = pg_query_params($db_conn, "SELECT * FROM customer WHERE username = $1", array($username));
    $row = pg_fetch_assoc($select);
    $pwdHash = $row["password"];

    if(!(pg_num_rows($select) > 0)) {
        header("location: /index.php?error=usernamedoesnotexist");
        exit();
    }
    else if(!password_verify($password, $pwdHash)){
        header("location: /index.php?error=incorrectpassword");
        exit();
    }
    else{
        session_start();
        $_SESSION["fullName"] = $row["name"];
        $_SESSION["customer_id"] = $row["customer_id"];
        $_SESSION["address"] = $row["address"];
        $_SESSION["password"] = $row["password"];
        $_SESSION["pin"] = $row["pin"];
        $_SESSION["username"] = $row["username"];

        $select = pg_query_params($db_conn, "SELECT * FROM account WHERE customer_id = $1", array($_SESSION["customer_id"]));
        $row = pg_fetch_assoc($select);

        $_SESSION["account_number"] = $row["account_number"];
        $_SESSION["accttype"] = $row["account_type"];

        if($_SESSION["accttype"] == 1){
            $select = pg_query_params($db_conn, "SELECT * FROM checkings WHERE account_number = $1", array($_SESSION["account_number"]));
            $row = pg_fetch_assoc($select);
            $_SESSION["bal"] = $row["c_bal"];
		}

		else if($_SESSION["accttype"] == 2){
            $select = pg_query_params($db_conn, "SELECT * FROM savings WHERE account_number = $1", array($_SESSION["account_number"]));
            $row = pg_fetch_assoc($select);
            $_SESSION["bal"] = $row["s_bal"];
		}


        header("location: /home.php");
        exit();
    }
}

?>