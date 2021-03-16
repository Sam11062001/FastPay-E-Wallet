<?php
session_start();
if(!isset($_SESSION['add_balance'])){
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Out of Balance</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../Recharge/error.css" />
    </head>
    <body>
        <div id="notfound">
            <div class="notfound">
                <div class="notfound-404">
                    <h1>Oops!</h1>
                    <h2>Your Don't Have Enough Balance For Transcation</h2>
                </div>
                <a href="add_balance.php">Add Money</a></div>
        </div>
    </body>
</html>
