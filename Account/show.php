<?php
session_start();
if (!isset($_SESSION['auth_user'])) {
    header("location:../index.php");
} else {
    $conn = new mysqli("localhost:3307", "root", "", "fastpay");

    if ($conn->connect_error) {
        header("location:../Login/error.html");
    }
    $name = $_SESSION['auth_user'];
    $get_deatils = "SELECT * From account WHERE Name='$name'";
    $result = $conn->query($get_deatils);
    $row = $result->fetch_assoc();
    $get_maximum_transaction = "SELECT MAX(id) FROM $name";
    $res = $conn->query($get_maximum_transaction);
    $row1 = $res->fetch_assoc();
    $conn->close();
}
?>
<html>
    <head>
        <title>FastPay-Account</title>

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }

            main {
                flex: 1 0 auto;
            }
            i{
                font-size:35px;
            }

        </style>

    </head>
    <body>
        <header>
            <nav>
                <div class="nav-wrapper">
                    <a href="show.php" class="brand-logo"><i class="material-icons prefix"style="font-size: 35px;" >account_circle</i>FastPay-Account</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../Recharge/recharge.php">Recharge</a></li>
                        <li><a href="../Money_Transfer/money_transfer.php">Money-Transfer</a></li>
                        <li><a href="../Transcation/show.php">View-Transaction</a></li>
                        <li><a href="../Login/Logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <main >
            <form action="edit.php" method="POST">
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card">
                            <div class="card-image">
                                <img src="img1.jpg">

                                <span class="card-title"><h1>Hello <?php echo $row["Name"]; ?>!</h1></span>


                            </div>
                            <div class="card-content">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="collection" style="margin-top:-850px;">
                    <li class="collection-item avatar">
                        <i class="material-icons circle red" style="font-size: 40px;">person</i>
                        <span class="title">UserName:</span>

                        <p style="margin-top:5px;font-size:20px;"><?php echo $row["Name"]; ?></p>


                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red">email</i>
                        <span class="title">Email:</span>
                        <p style="margin-top:5px;font-size:20px;"><?php echo $row["Email"]; ?></p>

                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red">phone</i>
                        <span class="title">Mobile-Number:</span>
                        <p style="margin-top:5px;font-size:20px;"><?php echo $row["MbNo"]; ?></p>

                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red">check_circle</i>
                        <span class="title">State</span>
                        <p style="margin-top:5px;font-size:20px;"><?php echo "Gujarat"; ?></p>

                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red">home</i>
                        <span class="title">City</span>
                        <p style="margin-top:5px;font-size:20px;"><?php echo $row["City"]; ?></p>

                    </li>

                    <li class="collection-item avatar">
                        <i class="material-icons circle red">location_on</i>
                        <span class="title">pincode</span>
                        <p style="margin-top:5px;font-size:20px;"><?php echo $row["pincode"]; ?></p>

                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red">security</i>
                        <span class="title">password</span>
                        <p style="margin-top:5px;font-size:20px;"><?php echo $row["Password"]; ?></p>

                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red">sentiment_satisfied</i>
                        <span class="title">Nick-Name</span>
                        <p style="margin-top:5px;font-size:20px;"><?php echo $row["Que_Ans"]; ?></p>

                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red">monetization_on</i>
                        <span class="title">Current-Balance</span>
                        <p style="margin-top:5px;font-size:20px;"><?php echo $row["Balance"]; ?></p>

                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red">monetization_on</i>
                        <span class="title">Total-Transaction</span>
                        <p style="margin-top:5px;font-size:20px;"><?php echo $row1["MAX(id)"]; ?></p>

                    </li>
                    <li class="collection-item avatar">
                        <button class="btn waves-effect waves-light" style="background-color:crimson;margin-left:60px;float:right;"type="submit" name="edit">edit
                            <i class="material-icons right">send</i>
                        </button>


                    </li>
                </ul>
            </form>
        </main>

        <footer class="page-footer" >
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h2 class="white-text" style="margin-left:-200px;"><a href="../index.php" style="color:white" >FastPay</a></h2>
                        <p class="grey-text text-lighten-4" style="margin-left:-200px;">
                            We are studying in DDU,Nadiad in Computer Engineering Department.This is the web Devlopment project developed by us for our semester project.
                            We hope that you liked our project .
                        </p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Developed By</h5>
                        <ul style="font-size:20px;">
                            <li>->Saurav Omprakash laddha</li>
                            <li>->Shyam DilipBhai Makwana</li>
                            <li>->Jay NileshKumar Mangukiya</li>

                        </ul>
                    </div>
                </div>
            </div>

        </footer>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var elems = document.querySelectorAll('.modal');
                var instances = M.Modal.init(elems, {});
            });</script>




    </body>
</html>