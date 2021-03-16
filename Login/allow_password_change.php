<?php
session_start();
if (!isset($_SESSION['change_password'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>

<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Password</title>
        <link rel="stylesheet" type="text/css" href="forgot_password.css"/>
    </head>
    <body>
        <div class="login-box">

            <form action="allow_password_change.php" method="POST">
                <div class="fp"><center><?php
                                                if (isset($_SESSION['not_matching_password'])) {
                                                    echo "Password do not match";
                                                } 
                    ?></center></div>
                <p>Enter New Password</p>
                <input type="text" name="password" onfocus="this.placeholder = ''" placeholder="Type your New Password" required/>
                <p>Enter Confirm Password</p>
                <input type="text" name="password1" onfocus="this.placeholder = ''" placeholder="Type your Confirm Password" required/>

                <input type="submit" name="submit_new_password" value="Change Password"/>   

            </form>
        </div>
    </body>
</html>
<?php
if (isset($_POST['submit_new_password'])) {
    $newPass = $_POST['password'];
    $newPass1 = $_POST['password1'];
    if ($newPass == $newPass1) {
        $name = $_SESSION['name_for_password_change'];
        $mysqli = new mysqli("localhost:3307", "root", "", "fastpay");

// Check connection
        if ($mysqli->connect_error) {
            header("location:error.html");
        }

// Perform query
        if ($result = $mysqli->query("UPDATE account set Password='$newPass' where Name='$name'")) {
            $mysqli->close();
          header("location:login.php");
        }
        
    }
    else{
        $_SESSION['not_matching_password']=1;
        header("location:allow_password_change.php");
    }
}
?>