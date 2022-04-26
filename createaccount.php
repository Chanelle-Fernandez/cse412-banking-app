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
	
	if(isset($_POST['submit']) || isset($_POST['submit2'])) {
		$userName = $_POST['userName'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$passwordconfirm = $_POST['confirmpassword'];
		$pin = $_POST['pin'];

		$acct = $_POST['accttype'];

	$hashedpass = password_hash($password, PASSWORD_DEFAULT);
	$fullName = $firstName . " " . $lastName;

	

	$select = pg_query_params($db_conn, "SELECT 1 FROM customer WHERE username = $1", array($userName));

    if(pg_num_rows($select) > 0) {
        header("location: /create.php?error=usernameinuse");
        exit();
    }
    else if($password !== $passwordconfirm){
        header("location: create.php?error=incorrectmatchingpasswords");
        exit();
    }
	else if(!is_numeric($pin)){
		header("location: create.php?error=pinisnotnumber");
	}
    else{
	//Creating customer data
		$val_array = array($address, $fullName, $hashedpass, $userName, $pin);
		var_dump($val_array);		

		$sql = "INSERT INTO customer ( address, name, password, username, pin) VALUES ($1, $2, $3, $4, $5)";
		$query = pg_query_params($db_conn, $sql, $val_array);
		
		//getting info for account data
		$select = pg_query_params($db_conn, "SELECT * FROM customer WHERE username = $1", array($userName));
		$row = pg_fetch_assoc($select);

		$val_array2 = array($row["customer_id"], $acct);
		var_dump($val_array2);

		$sql2 = "INSERT INTO account (customer_id, account_type) VALUES ($1, $2)";
		$query2 = pg_query_params($db_conn, $sql2, $val_array2);

		//see if it's checking or savings then save into that chart
		$select = pg_query_params($db_conn, "SELECT * FROM account WHERE customer_id = $1", array($row["customer_id"]));
		$row1 = pg_fetch_assoc($select);
		if($row1["account_type"] == 1){
			$val_array3 = array($row1["account_number"], 0);
			$sql3 = "INSERT INTO checkings (account_number, c_bal) VALUES ($1, $2)";
			$query3 = pg_query_params($db_conn, $sql3, $val_array3);
		}

		else if($row1["account_type"] == 2){
			$val_array4 = array($row1["account_number"], 0);
			$sql4 = "INSERT INTO savings (account_number, s_bal) VALUES ($1, $2)";
			$query4 = pg_query_params($db_conn, $sql4, $val_array4);
		}

        if ( $query && $query2) {
           if(isset($_POST['submit'])){
				header("location: /home.php");
		   }
		   else if(isset($_POST['submit2'])){
				header("location: /index.php");
		   }
        }
	}
	}

?>