<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="bankingApp.css">
    <link rel="stylesheet" href="cstyle.css">
    <title>CSE412 Banking App - Create an Account</title>
</head>
<body>
    <form action="createaccount.php" method="post">
        <div class="rectangle">

            <h1 style="color:rgba(255, 0, 0, 1); text-align: right;">Create an Account</h1>
            <p style="text-align: right;">Please fill out the form to create an account.</p>

            <?php
            if(isset($_GET["error"])){
                if($_GET['error'] == "incorrectmatchingpasswords"){
                    echo "<p style='color:rgb(248, 62, 125); text-align: center;'><b>Passwords do not match!</b></p>";
                }

                else if($_GET['error'] == "usernameinuse"){
                    echo "<p style='color:rgb(248, 62, 125); text-align: center;'><b>Username is already in use!</b></p>";
                }

                else if($_GET['error'] == "pinisnotnumber"){
                    echo "<p style='color:rgb(248, 62, 125); text-align: center;'><b>Pin needs to be a number</b></p>";
                }

                else if($_GET['error'] == "none"){
                    echo "<p style='color:rgb(248, 62, 125); text-align: center;'><b>Successfully Signed up!</b></p>";
                }
            }
            ?>


            <div class="form-group">
                <label for="userName">Username:</label>
                <input type="text" id="userName" name="userName" placeholder="Username..." required />
            </div>
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" placeholder="First Name..." required />
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" placeholder="Last Name..." required />
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" placeholder="Address..." required />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Password..." required />
            </div>
            <div class="form-group">
                <label for="confirmpin">Confirm Password:</label>
                <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required />
            </div>
            <div class="form-group">
                <label for="pin">Pin:</label>
                <input type="pin" id="pin" name="pin" placeholder="Create Pin" required />
            </div>
            <label for="type">Type of Account:</label>
            <select id="accttype" name="accttype" required>
                <option selected disabled>[Click for options]</option>
                <option value="1">Checking</option>
                <option value="2">Savings</option>
            </select>
            <div class="text-center">
                <button type="submit" name="submit">
                    Submit
                </button>
                <button name="cancel">
                    Cancel
                </button>
            </div>
        </div>
    </form>
</body>
</html>