
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
}
?>
<html>
    <head>
        <title>Edit-Account</title>

        <script>
            function go() {
                window.location = "../";
            }
        </script>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    </head>
    <body>
        <header>
            <nav>
                <div class="nav-wrapper" style="margin-left:10px;">
                    <a href="edit.php" class="brand-logo">Update-Account    </a>

                </div>
            </nav>
        </header>
        <main>
<?php
if (isset($_SESSION['update_error'])) {
    echo "<ul style=font-size:20px;margin-left:10px;>";
    foreach ($_SESSION['update_error'] as $value) {
        echo "<li>";
        echo "<font color='red'>" . $value . "</font></li><br>";
    }
    echo "</ul>";
    unset($_SESSION['update_error']);
}
?>
            <div id="register-page" class="row">
                <div class="col s12 z-depth-6 card-panel">
                    <form class="register-form" action="update.php" method="POST">        
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="mdi-social-person-outline prefix"></i>
                                <input type="text" value="<?php echo $row["Name"]; ?>"class="validate" name="name" required/>
                                <label for="user_name" class="center-align">Username</label>
                                <span class="helper-text" data-error="wrong" data-success="right">Abc</span>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="mdi-communication-email prefix"></i>
                                <input id="user_email"value="<?php echo $row["Email"]; ?>" name="email" type="text" class="validate" required/>
                                <label for="user_email" class="center-align">Email</label>
                                <span class="helper-text" data-error="wrong" data-success="right">abc123@gmail.com</span>
                            </div>
                        </div>



                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="mdi-action-lock-outline prefix"></i>
                                <input id="user_passw" value="<?php echo $row["Password"]; ?>" type="password" name="pwd" class="validate" required/>
                                <label for="user_passw">Password</label>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="mdi-action-lock-outline prefix "></i>
                                <input id="confirm_pass" value="<?php echo $row["Password"]; ?>"    name="pwd1" type="password" required/>
                                <label for="confirm_pass">Re-type password</label>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">nature_people</i>
                                <input id="user_name"  value="<?php echo $row["Que_Ans"]; ?>"type="text" name="nick" class="validate"  required/>
                                <label for="user_name" class="center-align">Nick-Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light" type="reset" >Reset
                                    <i class="material-icons right">send</i>
                                </button>
                                <button class="btn waves-effect waves-light" type="submit" name="update_data">Update
                                    <i class="material-icons right">send</i>
                                </button>


                            </div>

                        </div>
                    </form>
                </div>
            </div
        </main>
        <footer class="page-footer" style="background-color: lightcoral;" >
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
