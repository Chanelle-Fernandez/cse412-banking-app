<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/35f5ccb2f2.js" crossorigin="anonymous"></script>
    <title>Banking Application</title>
</head>
<body>
    <?php
        session_start();
        echo "<h1 style='color: white; margin-bottom: 10px;'>Account Number: ".$_SESSION["account_number"]."</h1>";
    ?>
    <button class="favorite styled" type="button" onclick="window.location.href='transfer.php';">
        <i class="fa-solid fa-money-bill-transfer fa-2x" alt="Transfer" ></i> Transfer
    </button>
    <button class="favorite styled" type="button" onclick="window.location.href='withdraw.php';">
        <i class="fa-solid fa-arrow-up-right-from-square fa-2x" alt="Withdraw"></i> Withdraw
    </button>
    <button class="favorite styled" type="button" onclick="window.location.href='deposit.php';">
        <i class="fa-solid fa-circle-arrow-down fa-2x" alt="Deposit"></i> Deposit
    </button>
    <button class="favorite styled" type="button" onclick="window.location.href='create.php';">
         <i class="fa-solid fa-building-columns fa-2x" alt="Accounts"></i> Create New Account
    </button>
    <button class="favorite styled" type="button" onclick="window.location.href='logout.php';">
        Logout
    </button>
    
</body>
</html>