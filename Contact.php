<?php

session_start();
if (!isset($_POST['Send_message'])) {
    header("location:index.php");
} else {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_send = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $email="fastpay196@gmail.com";
    $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
    //message body for email
    $msg = "
         <html>
            <head>
             <title>Enquiry</title>
            </head>
            <body>
                <p>Name:<strong>$first_name $last_name</strong></p>
                    
                    <p>Subject:<strong>$subject</strong></p>
                        <p>$message</p>
                            
            </body>
          </html>";

    if (!mail($email, "Enquiry", $msg, $headers)) {
        header("location:Login/error.html");
    }
    else
    {
        header("location:contactSoon.html");
    }
}
?>


