<?php

session_start();
if (isset($_POST['submit_login'])) {
    $auth_user = $_POST['username'];
    $auth_password = $_POST['password'];
    $mysqli = new mysqli("localhost:3307", "root", "", "fastpay");

// Check connection
    if ($mysqli->connect_error) {
        header("location:error.html");
       
    }

// Perform query
    if ($result = $mysqli->query("SELECT * FROM account WHERE Name='$auth_user' and password='$auth_password'")) {
        $rowcount = $result->num_rows;
    }
    if ($rowcount == 1) {
        $_SESSION['logged'] = 1;
        $_SESSION['auth_user'] = $auth_user;
        header("location:../index.php");
    } else {
        $_SESSION['wrong_input'] = "Invalid Credentials";
        header("location:login.php");
    }
    $mysqli->close();
} else {

    header("location:../index.php");
}
?>