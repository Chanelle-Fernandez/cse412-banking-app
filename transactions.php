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
	
	session_start();


	if(isset($_POST['deposit'])) {	
		$amount = $_POST['amount'];
		$_SESSION['bal'] += $amount;
		
		//updating transaction table
		$val_array = array($_SESSION["account_number"]);
		var_dump($val_array);		

		$sql = "INSERT INTO transaction (account_number) VALUES ($1) RETURNING transaction_id";
		$query = pg_query_params($db_conn, $sql, $val_array);

		//updating deposit table;
		$row = pg_fetch_row($query);
		$trans_id = $row['0'];

		$val_array = array($amount, $trans_id);
		var_dump($val_array);		

		$sql = "INSERT INTO deposit (deposited, transaction_id) VALUES ($1, $2)";
		$query = pg_query_params($db_conn, $sql, $val_array);
		
		//updating the account

		if($_SESSION["accttype"] == 1){
			$update = pg_query_params($db_conn, "UPDATE checkings SET c_bal = $1 WHERE account_number = $2", array($_SESSION['bal'], $_SESSION["account_number"]));
			header("location: /home.php");
		}

		else if($_SESSION["accttype"] == 2){
			$update = pg_query_params($db_conn, "UPDATE savings SET s_bal = $1 WHERE account_number = $2", array($_SESSION['bal'], $_SESSION["account_number"]));
			header("location: /home.php");
		}

	}
	 
	else if(isset($_POST['withdraw'])) {
		$amount = $_POST['amount'];
		$_SESSION['bal'] -= $amount;

		//updating transaction table
		$val_array = array($_SESSION["account_number"]);
		var_dump($val_array);		

		$sql = "INSERT INTO transaction (account_number) VALUES ($1) RETURNING transaction_id";
		$query = pg_query_params($db_conn, $sql, $val_array);

		//updating deposit table;
		$row = pg_fetch_row($query);
		$trans_id = $row['0'];

		$val_array = array($amount, $trans_id);
		var_dump($val_array);		

		$sql = "INSERT INTO withdraw (withdrawn, transaction_id) VALUES ($1, $2)";
		$query = pg_query_params($db_conn, $sql, $val_array);

		//updating the account

		if($_SESSION["accttype"] == 1){
            $update = pg_query_params($db_conn, "UPDATE checkings SET c_bal = $1 WHERE account_number = $2", array($_SESSION['bal'], $_SESSION["account_number"]));
			header("location: /home.php");
		}

		else if($_SESSION["accttype"] == 2){
            $update = pg_query_params($db_conn, "UPDATE savings SET s_bal = $1 WHERE account_number = $2", array($_SESSION['bal'], $_SESSION["account_number"]));
			header("location: /home.php");
		}
	}

	else if(isset($_POST['transfer'])) {	
		$amount = $_POST['amount'];
		$acct = $_POST['to'];
		$_SESSION['bal'] -= $amount;

		//updating transaction table
		$val_array = array($_SESSION["account_number"]);
		var_dump($val_array);		

		$sql = "INSERT INTO transaction (account_number) VALUES ($1) RETURNING transaction_id";
		$query = pg_query_params($db_conn, $sql, $val_array);

		//updating deposit table;
		$row = pg_fetch_row($query);
		$trans_id = $row['0'];

		$val_array = array($amount, $acct, $trans_id);
		var_dump($val_array);		

		$sql = "INSERT INTO transfer (amount, dst_account, transaction_id) VALUES ($1, $2, $3)";
		$query = pg_query_params($db_conn, $sql, $val_array);

		//subtract amount from acct
		if($_SESSION["accttype"] == 1){
            $update = pg_query_params($db_conn, "UPDATE checkings SET c_bal = $1 WHERE account_number = $2", array($_SESSION['bal'], $_SESSION["account_number"]));
		}

		else if($_SESSION["accttype"] == 2){
            $update = pg_query_params($db_conn, "UPDATE savings SET s_bal = $1 WHERE account_number = $2", array($_SESSION['bal'], $_SESSION["account_number"]));
		}

		//add amount to acct specified
		$select = pg_query_params($db_conn, "SELECT * FROM account WHERE account_number = $1", array($acct));
        $row = pg_fetch_assoc($select);
		$accttype = $row["account_type"];

		if($accttype == 1){
			$select = pg_query_params($db_conn, "SELECT * FROM checkings WHERE account_number = $1", array($acct));
			$row = pg_fetch_assoc($select);
            $row["c_bal"] += $amount;
			$update = pg_query_params($db_conn, "UPDATE checkings SET c_bal = $1 WHERE account_number = $2", array($row["c_bal"], $acct));
			header("location: /home.php");
		}

		else if($accttype == 2){
			$select = pg_query_params($db_conn, "SELECT * FROM savingss WHERE account_number = $1", array($acct));
            $row["s_bal"] += $amount;
			$update = pg_query_params($db_conn, "UPDATE savings SET s_bal = $1 WHERE account_number = $2", array($row["s_bal"], $acct));
			header("location: /home.php");
		}
	}
?>
