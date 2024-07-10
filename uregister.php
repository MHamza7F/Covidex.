
<?php
include('../db/connection.php');


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Covidex.</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <h1>Sign up</h1>
        <div class="container">
            <div class="sign-up-content">
                <form  method="POST" enctype="multipart/form-data" class="signup-form">
                    <h2 class="form-title">Register</h2>
                    
                    <div class="form-textbox">
                        <label for="name">Full name</label>
                        <input type="text" name="uname" id="name" />
                    </div>

                    <div class="form-textbox">
                        <label for="email">Email</label>
                        <input type="email" name="uemail" id="email" />
                    </div>

                    <div class="form-textbox">
                        <label for="pass">Password</label>
                        <input type="password" name="upass" id="pass" />
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div>

                    <div class="form-textbox">
                        <input type="submit" name="subdata" id="submit" class="submit" value="Create account" />
                    </div>
                </form>

                <p class="loginhere">
                    Already have an account ?<a href="ulogin.php" class="loginhere-link"> Log in</a>
                </p>
            </div>
        </div>

    </div>
    <?php
if (isset($_POST['subdata'])) {
    $ud = $_POST['uname'];
    $ub = $_POST['uemail'];
    $uf = $_POST['upass'];

    $e_key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
    $nonces = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
    $ency_value = sodium_crypto_secretbox($uf, $nonces, $e_key);

    $keys = sodium_bin2hex($e_key);
    $nons = sodium_bin2hex($nonces);
    $msgs = sodium_bin2hex($ency_value);

    $res = $con->prepare("INSERT INTO `uregister`( `u_name`, `u_email`, `u_key`, `u_nonce`, `u_values`)  VALUES (?, ?, ?, ?, ?)");

    $res->bindParam(1, $ud);
    $res->bindParam(2, $ub);
    $res->bindParam(3, $keys);
    $res->bindParam(4, $nons);
    $res->bindParam(5, $msgs);

    if ($res->execute()) {
        $cookieName = 'auth';
        $cookieValue = $ub;
        $cookieExpire = time() + 86400;
        setcookie($cookieName, $cookieValue, $cookieExpire, '/');
        
        header("Location:ulogin.php");
    } else {
        echo "Error inserting data: " . $res->errorInfo()[2];
    }
}
?>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>