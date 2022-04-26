<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lstyle.css">
    <script src="https://kit.fontawesome.com/35f5ccb2f2.js" crossorigin="anonymous"></script>
    <title>CSE412 Banking App - Create an Account</title>
</head>
<body>
    <form action="signin.php" method="post">
        <div class="rectangle">
            <h1 style="color:rgba(255, 0, 0, 1); text-align: center; font-size: 3rem;">Sign In</h1>

            
            <?php
                if(isset($_GET["error"])){
                    if($_GET['error'] == "usernamedoesnotexist"){
                        echo "<p style='color:rgb(248, 62, 125);'><b>Username does not exist!</b></p>";
                    }

                    else if($_GET['error'] == "incorrectpassword"){
                        echo "<p style='color:rgb(248, 62, 125);'><b>Incorrect Password!</b></p>";
                    }
                    else if($_GET['error'] == "none"){
                        echo "<p style='color:rgb(248, 62, 125);'><b>Successfully Created an Account!</b></p>";
                    }
            }
            ?>

            <div class="form-group">
                <label for="userName">Username:</label>
                <input type="text" id="userName" name="userName" placeholder="Username..." required />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Password..." required />
            </div>
            <a href="create2.php" style="color: white;">New User? Click here..</a>
            <div class="text-center">
                <button type="submit" name="submit">
                    Sign In
                </button>

            </div>
        </div>
    </form>
</body>
</html>