
<?php session_start(); ?>
<html>
    <head>
        <title>SignUp</title>

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
                    <a href="Register.php" class="brand-logo">Signup</a>

                </div>
            </nav>
        </header>
        <main>
             <?php
                    if (isset($_SESSION['error'])) {
                        echo "<ul style=font-size:20px;margin-left:10px;>";
                        foreach ($_SESSION['error'] as $value) {
                            echo "<li>";
                            echo "<font color='red'>" . $value . "</font></li><br>";
                        }
                        echo "</ul>";
                        unset($_SESSION['error']);
                    }
                    ?>
            <div id="register-page" class="row">
                <div class="col s12 z-depth-6 card-panel">
                    <form class="register-form" action="otp_validate.php" method="POST">        
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="mdi-social-person-outline prefix"></i>
                                <input type="text" class="validate" name="name" required/>
                                <label for="user_name" class="center-align">Username</label>
                                <span class="helper-text" data-error="wrong" data-success="right">Abc</span>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="mdi-communication-email prefix"></i>
                                <input id="user_email" name="email" type="text" class="validate" required/>
                                <label for="user_email" class="center-align">Email</label>
                                <span class="helper-text" data-error="wrong" data-success="right">abc123@gmail.com</span>
                            </div>
                        </div>

                        <div class="row margin">
                            <div class="input-field col s12">

                                <i class="material-icons prefix">phone</i>
                                <input  type="text" name="mbno" class="validate" required/>
                                <label for="Mobile" class="center-align" name="mbno">Mobile-Number</label>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">

                                <i class="material-icons prefix">home</i>
                                <input   disabled value="Gujarat"  type="text" name="state" class="validate" required/>
                                <label for="Mobile" class="center-align" name="mbno"></label>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">

                                <i class="material-icons prefix">home</i>
                                <input     type="text" name="city" class="validate" required/>
                                <label for="Mobile" class="center-align" name="city">City</label>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">

                                <i class="material-icons prefix">place</i>
                                <input     type="text" pattern="[0-9]{6}" name="pincode" class="validate" required/>
                                <label for="Mobile" class="center-align" name="city">pincode</label>
                                <span class="helper-text" data-error="wrong" data-success="right">123456</span>
                            </div>
                        </div>

                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="mdi-action-lock-outline prefix"></i>
                                <input id="user_passw" type="password" name="pwd" class="validate" required/>
                                <label for="user_passw">Password</label>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="mdi-action-lock-outline prefix "></i>
                                <input id="confirm_pass" name="pwd1" type="password" required/>
                                <label for="confirm_pass">Re-type password</label>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">nature_people</i>
                                <input id="user_name" type="text" name="nick" class="validate"  required/>
                                <label for="user_name" class="center-align">Nick-Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light" type="reset" >Reset
                                    <i class="material-icons right">send</i>
                                </button>
                                <button class="btn waves-effect waves-light" type="submit" name="Signup">register
                                    <i class="material-icons right">send</i>
                                </button>
                                

                            </div>
                            <div class="input-field col s12">
                                <p class="margin center medium-small sign-up">Already have an account? <a href="login.php">Login</a></p>
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
