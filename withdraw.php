<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="wstyle.css">
    <title>Document</title>
</head>
<body>
    <form action="transactions.php" method="post">
        <div class="rectangle">
            <?php
                session_start();
                echo "<h1 style='color: white; margin-bottom: 10px;'>Account Number: ".$_SESSION["account_number"]."</h1>";
                echo "<h1 style='color: white; margin-bottom: 10px;'>Balance: ".$_SESSION["bal"]."</h1>";
            ?>
            <h1 style="color:rgba(255, 0, 0, 1); text-align: center; font-size: 3rem;">Withdraw</h1>
            
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="text" id="amount" name="amount" placeholder="Amount to Withdraw" required />
            </div>
            <div class = "text-center">
                <button type="submit" name="withdraw">
                    Withdraw
                </button>
                <button type="cancel" name="cancel" onclick="window.location.href='home.php';">
                    Cancel
                </button>
                
            </div>
        </div>
    </form>
</body>
</html>