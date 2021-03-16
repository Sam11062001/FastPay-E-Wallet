<?php

session_start();

if (isset($_SESSION['auth_user'])) {
    session_unset();
    header("location:../index.php");
} else {
    header("location:../index.php");
}
?>


