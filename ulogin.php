<?php
include('../db/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In Covidex.</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <h1>Sign In</h1>
        <div class="container">
            <div class="sign-up-content">
                <form method="POST" class="signup-form">
                    <h2 class="form-title">Login</h2>

                    <div class="form-textbox">
                        <label for="email">Email</label>
                        <input type="email" name="emailu" id="email" />
                    </div>

                    <div class="form-textbox">
                        <label for="pass">Password</label>
                        <input type="password" name="passu" id="pass" />
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div>

                    <div class="form-textbox">
                        <input type="submit" name="subdate" id="submit" class="submit" value="Login" />
                    </div>
                </form>
                <br>
                <div class="d-flex justify-content-center">
                <a href="uregister.php" class="btn btn-primary"><button class="submit">Create Account</button></a>
                </div>            
            </div>
        </div>


    </div>

<?php
session_start();

if (isset($_POST['subdate'])) {
    $email = $_POST['emailu'];
    $password = $_POST['passu'];
    
    $stmt = $con->prepare("SELECT u_key, u_nonce, u_values FROM uregister WHERE u_email = ?");
    $stmt->bindParam(1, $email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $key = hex2bin($row['u_key']);
        $nonce = hex2bin($row['u_nonce']);
        $msg = hex2bin($row['u_values']);
        $decryptedPassword = sodium_crypto_secretbox_open($msg, $nonce, $key);

        if ($decryptedPassword !== false && $decryptedPassword === $password) {
            
            $cookieName = 'auth';
            $cookieValue = $email;
            $cookieExpire = time() + 86400;

            setcookie($cookieName, $cookieValue, $cookieExpire, '/');
            $_SESSION['auth'] = true;
            $_SESSION['shownav'] = $email;

            header("Location: ../index.php");
            exit();
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('Email not found!');</script>";
    }
}
?>


    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>