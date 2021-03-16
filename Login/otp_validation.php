<?php

session_start();
//connection to database
$con = new mysqli('localhost:3307', 'root', '', 'fastpay');
if ($con->connect_error) {
    header("location:error.html");
}
 else {
    
 $_SESSION['connection']=$con;
     
 }
if (isset($_POST['otp_submit'])) {
    $user_otp = $_POST['otp_enter'];
    $comp_otp = $_SESSION['otp_comp'];
    if ($user_otp != $comp_otp) {
        $_SESSION['wrong_otp'] = "Invalid OTP";
        header("location:invalid_otp.php");
    } else {
        $username = $_SESSION['l_username'];
        $email = $_SESSION['l_email'];
        $mobile = $_SESSION['l_mobile'];
        $state = $_SESSION['l_state'];
        $city = $_SESSION['l_city'];
        $pincode = $_SESSION['l_pincode'];
        $pass1 = $_SESSION['l_password'];
        $balance = $_SESSION['l_balance'];
        $another_name = $_SESSION['l_nickname'];
        $sql_query = "INSERT INTO account(Name,Email,MbNo,State,City,pincode,password,Balance,Que_Ans) VALUES('$username','$email','$mobile','$state','$city',$pincode,'$pass1',$balance,'$another_name')";
        $table_create = "CREATE TABLE $username (
                        id INT(6) UNSIGNED  AUTO_INCREMENT PRIMARY KEY,
                        transcation_id int(30),
                        Module VARCHAR(255) NOT NULL,
                        Company VARCHAR(255) NOT NULL,
                        DBCR VARCHAR(15) NOT NULL,
                        Money INT(9) NOT NULL,
                        date_time DATETIME NOT NULL,
                        FOREIGN KEY(transcation_id) REFERENCES transcation(transcation_id)
                        )";

        if ($con->query($sql_query)) {
            $con->query($table_create);
            $con->close();
            $make_folder="../Invoices/".$username;
            mkdir($make_folder);
            header("location:login.php");
        } else {
            header("loaction:error.html");
        }
    }
} else {
    header("location:../index.php");
}
?>