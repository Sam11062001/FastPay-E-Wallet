<?php 
session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css"/>
</head>
<body>
    <div class="login-box">
       <?php
       if(isset($_SESSION['wrong_input'])){
           echo "<h4><center>Login</center></h4>";
           echo "<h4><center>".$_SESSION['wrong_input']."</center></h4>";
           unset($_SESSION['wrong_input']);
       }
       else
       {
           echo "<h1>Login</h2>";
       }
       ?>
        <form action="valid_login.php" method="POST">
          
            <p>Username</p>
            <input type="text" name="username" onfocus="this.placeholder=''" placeholder="Type your username" required/>
            <p>Password</p>
            <input type="password" name="password" onfocus="this.placeholder=''" placeholder="Type your password" required/>
            <div class="forget-password">
                <a href="forgot_password.php">Forget Password?</a></div>
            <input type="submit" name="submit_login" value="LOGIN"/>   
            <div class="sign-up">
                Or Sign Up using<br>  
                <a href="Register.php">Sign Up</a></div>
        </form>
    </div>
</body>
</html>
