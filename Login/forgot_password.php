<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password</title>
        <link rel="stylesheet" type="text/css" href="forgot_password.css"/>
    </head>
    <body>
        <div class="login-box">

            <form action="forgot_password.php" method="POST">
                <div class="fp"><center><?php
                                                if (isset($_SESSION['invalid_forgot'])) {
                                                    echo "Invalid Credentials";
                                                } else {
                                                    echo "Forgot Password";
                                                }
                    ?></center></div>
                <p>Enter Your Name</p>
                <input type="text" name="username" onfocus="this.placeholder = ''" placeholder="Type your Name" required/>
                <p>Enter Your Nick Name</p>
                <input type="text" name="nick_name" onfocus="this.placeholder = ''" placeholder="Type your Nick Name" required/>
                 <div class="forget-password">
                <a href="../index.php">Go to Home</a></div>
                <input type="submit" name="submit_forgot_password" value="Submit"/>   

            </form>
        </div>
    </body>
</html>
<?php
if (isset($_POST['submit_forgot_password'])) {
    $name = $_POST['username'];
    $nick = $_POST['nick_name'];
    $mysqli = new mysqli("localhost:3307", "root", "", "fastpay");

// Check connection
    if ($mysqli->connect_error) {
        header("location:error.html");
    }

// Perform query
    if ($result = $mysqli->query("SELECT * FROM account WHERE Name='$name' and Que_Ans='$nick'")) {
        $rowcount = $result->num_rows;
    }
    if ($rowcount == 1) {
        $_SESSION['change_password']=1;
        $_SESSION['name_for_password_change']=$name;
        header("location:allow_password_change.php");
        $mysqli->close();
    } else {
        $_SESSION['invalid_forgot'] = 1;
        header("location:forgot_password.php");
        $mysqli->close();
    }
}
?>