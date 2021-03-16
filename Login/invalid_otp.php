<?php
session_start();
if(!isset($_SESSION['wrong_otp'])){
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="otp.css"/>
        <title>Invalid OTP</title>
    </head>
    <body>
        <div class="login-box">
<?php
$mg = "Please Enter the OTP";
if (isset($_SESSION['wrong_otp'])) {
    echo "<h1>" . $_SESSION['wrong_otp'] . "</h1>";
} else {
    echo "<h1>" . $mg . "</h1>";
}
?>
            <form action='otp_validation.php' method="POST">

                <p>OTP</p><input type="text" name="otp_enter" placeholder="Enter Otp sent to your email">
                <br>
                <input type="submit" name="otp_submit" value="Verify Otp"/>
            </form>
        </div>
    </body>
</html>