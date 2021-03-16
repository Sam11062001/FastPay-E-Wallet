<?php

session_start();


$con = new mysqli('localhost:3307', 'root', '', 'fastpay');
if (!isset($_SESSION['add_balance'])) {
    header("location:recharge.php");
} else {
    $username = $_SESSION['auth_user'];

    if ($con->connect_error) {
        header("location:../Login/error.html");
    }
    $balance = 10000;
    $query = "UPDATE account set Balance=$balance where Name='$username'";
    if ($con->query($query)) {
        unset($_SESSION['add_balance']);
        header("location:recharge.php");
    }
}
?>
	


