<?php

session_start();
if (!isset($_SESSION['auth_user']) or ! isset($_POST['update_data'])) {
    header("location:../Login/error.html");
} else {
    $update_array = array();
    $conn = new mysqli("localhost:3307", "root", "", "fastpay");
    if ($conn->connect_error) {
        header("location:../Login/error.html");
    }
    $get_old_details = "SELECT * FROM account WHERE Name='" . $_SESSION['auth_user'] . "'";
    $r = $conn->query($get_old_details);
    $row = $r->fetch_assoc();
    $new_name = $_POST['name'];
    $new_email = $_POST['email'];
    $newpass1 = $_POST['pwd'];
    $newpass2 = $_POST['pwd1'];
    $newnick = $_POST['nick'];
    //validating the name pattern
    $name_pattern = "/[a-zA-Z]*/";


    if (strcmp($new_name, $row['Name']) != 0) {

        if (!preg_match($name_pattern, $new_name)) {
            array_push($update_array, "The username is invalid");
        } else {
            $query = "Select Name from account where Name='" . $_SESSION['auth_user'] . "'";
            if ($result = $conn->query($query)) {
                $user_row_count = $result->num_rows;
            }
            if ($user_row_count == 1) {
                array_push($update_array, "Name is already taken");
            }
        }
    }

    //validation of the email
    if (strcmp($new_email, $row["Email"]) != 0) {
        $email_pattern = "/[a-zA-Z0-9][a-zA-Z0-9._]*@[a-zA-Z0-9]+([.][a-zA-Z]+)+/";
        if (!preg_match($email_pattern, $new_email)) {
            array_push($update_array, "Email is invalid");
        } else {
            if ($email_r = $conn->query("Select * from account where Email='$new_email'")) {
                $email_row_count = $email_r->num_rows;
            }
            if ($email_row_count == 1) {
                array_push($update_array, "Email is already exists");
            }
        }
    }
    //validation of the password enter by the user
    if ($newpass1 != $newpass2) {
        array_push($update_array, "Password do not match");
    }
    
        $nick_pattern = "/[a-zA-Z]*/";
        if (!preg_match($nick_pattern, $newnick)) {
            array_push($error, "Nick Name is invalid");
        }
    
    if (count($update_array) == 0) {
        $update_new_data="UPDATE account set Name='$new_name',Email='$new_email',Password='$newpass1',Que_Ans='$newnick' WHERE Name='".$_SESSION['auth_user']."'";
        if($conn->query($update_new_data)){
            $conn->close();
            header("location:show.php");
        }
 
        
                
        
    } else {
        $_SESSION['update_error'] = $update_array;
        header("location:edit.php");
    }
}
?>


