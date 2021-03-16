<?php session_start(); ?>
<?php
//connection to database
$con = new mysqli('localhost:3307', 'root', '', 'fastpay');
if ($con->connect_error) {
    header("location:error.html");
}

$error = array();
//Sign up button is pressed 
if (isset($_POST['Signup'])) {
    //take all the values
    $username = $_POST['name'];
    $email = $_POST['email'];

    $mobile = $_POST['mbno'];
    $state = "Gujarat";
    $city = $_POST['city'];
    $pincode = (int) $_POST['pincode'];
    $pass1 = $_POST['pwd'];
    $pass2 = $_POST['pwd1'];
    $another_name = $_POST['nick'];
    //validating the name pattern
    $name_pattern = "/[a-zA-Z]*/";
    if (!preg_match($name_pattern, $username)) {
        array_push($error, "The username is invalid");
    } else {
        $query = "Select name from account where Name='$username'";
        if ($result = $con->query($query)) {
            $user_row_count = $result->num_rows;
        }
        if ($user_row_count == 1) {
            array_push($error, "Name is already taken");
        }
    }

    //validation of the email
    $email_pattern = "/[a-zA-Z0-9][a-zA-Z0-9._]*@[a-zA-Z0-9]+([.][a-zA-Z]+)+/";
    if (!preg_match($email_pattern, $email)) {
        array_push($error, "Email is invalid");
    } else {
        if ($email_r = $con->query("Select * from account where Email='$email'")) {
            $email_row_count = $email_r->num_rows;
        }
        if ($email_row_count == 1) {
            array_push($error, "Email is already exists");
        }
    }
    //validation of the pattern
    $mbno_pattern = "/[6789]{1}[0-9]{9}/";
    if (!preg_match($mbno_pattern, $mobile)) {
        array_push($error, "Mobile Number is Invalid");
    }
    //validation of the password enter by the user
    if ($pass1 != $pass2) {
        array_push($error, "Password do not match");
    }
    $pincod_pattern = "/[0-9]{6}/";
    if (!preg_match($pincod_pattern, $pincode)) {
        array_push($error, "Pincode is invalid");
    }
    $nick_pattern = "/[a-zA-Z]*/";
    if (!preg_match($nick_pattern, $another_name)) {
        array_push($error, "Nick Name is invalid");
    }
    //check if no error are generated then send the email to user email id
    if (count($error) == 0) {
        //enter the data in database
       
        $_SESSION['l_username'] = $username;
        $_SESSION['l_email'] = $email;
        $_SESSION['l_mobile'] = $mobile;
        $_SESSION['l_state'] = $state;
        $_SESSION['l_city'] = $city;
        $_SESSION['l_pincode'] = $pincode;
        $_SESSION['l_password'] = $pass1;
        $_SESSION['l_balance'] = 10000;
        $_SESSION['l_nickname'] = $another_name;



        //seding the otp on gmail account using mail function
        $otp_genrate = rand(100000, 999999);
        $_SESSION["otp_comp"] = $otp_genrate;

        $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
        //message body for email
        $msg = "
         <html>
            <head>
             <title>Otp Verification</title>
            </head>
            <body>
                <p>Hi " . $username . " !!</p>
                <br/>
                <p>Thanks for registering on our website</p>
                <br/>
                your OTP is:<strong>" . $otp_genrate . "</strong>
                    <p>Thanks for visiting the Web Appilication <strong>FastPay</strong></p>
                    <p>With Regards:-Team <strong>FastPay</strong>
                    <p>Good Day</p>
            </body>
          </html>";

        if(!mail($email, "otp Verification", $msg, $headers)){
            header("location:error.html");
        }
    } else {
        $_SESSION['error'] = $error;
        header("location:Register.php?array_error=Yes");
    }
} else {
    //if directing acces to page not allowed and redirecting to home page of web appilication
    header("location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="otp.css"/>
        <title>Otp Verification</title>
    </head>
    <body>
        <div class="login-box">
<?php
$mg = "Please Enter the OTP";
if (isset($_GET['wrong_otp'])) {
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
