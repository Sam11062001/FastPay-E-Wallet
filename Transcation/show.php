<?php
session_start();

if (!isset($_SESSION['auth_user'])) {
    header("location:../index.php");
} else {
    $conn = new mysqli("localhost:3307", "root", "", "fastpay");
    if ($conn->connect_error) {
        header("location:../Login/error.html");
    } else {
        $name = $_SESSION['auth_user'];
        $query = "SELECT * FROM $name";
        $result = $conn->query($query);
        $count = 1;
    }
}
?>
<html>
    <head>
        <title>
            Transaction-History
        </title>
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }

            main {
                flex: 1 0 auto;
            }
        </style>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        
    <body>
       
      
        <header>
            <nav style="background-color: lightcoral">
                <div class="nav-wrapper">
                    <a href="show.php" class="brand-logo" style="margin-left:5px;">Transactions</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">

                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../Login/Logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
           
            <table class="highlight" >
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>Transaction_No</th>
                        <th>Module</th>
                        <th>Company/To</th>
                        <th>Debit/Credit</th>
                        <th>Money</th>
                        <th>Date-Time</th>
                        <th>Payment-Receipt</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $count . "</td>";
                            $count++;
                            echo "<td>" . $row["transcation_id"] . "</td>";
                            echo "<td>" . $row["Module"] . "</td>";
                            echo "<td>" . $row["Company"] . "</td>";
                            echo "<td>" . $row["DBCR"] . "</td>";
                            echo "<td>" . $row["Money"] . "</td>";
                            echo "<td>" . $row["date_time"] . "</td>";
                            $url="../Invoices/".$_SESSION['auth_user']."/".$row['transcation_id'].".pdf";
                            echo "<td><a href='$url' download>Download</a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </main>

        <footer class="page-footer" style="background-color: lightcoral">
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




    </body>
</html>