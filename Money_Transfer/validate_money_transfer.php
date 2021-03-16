<?php

session_start();
$conn = new mysqli("localhost:3307", "root", "", "fastpay");
// Check connection
if ($conn->connect_error) {
    header("location:../Login/error.html");
}
$money_arr = array();
if (isset($_POST['done_money_transfer'])) {

    $credit_user = $_POST['credit_user'];
    echo $credit_user;
    //check for valid user query
    $validate_credit_user_query = "SELECT Name From account WHERE Name='$credit_user'";
    $result = $conn->query($validate_credit_user_query);
    echo $result->num_rows;
    if ($result->num_rows == 0) {
        array_push($money_arr, "Please Enter Valid Name For Money Transcation");
    }


    $money = $_POST['money'];

    if (count($money_arr) == 0) {
        $nm = $_SESSION['auth_user'];
        $get_current_balance = "SELECT id,Balance,email FROM account WHERE Name='$nm'";
        $result = $conn->query($get_current_balance);
        $row = $result->fetch_assoc();
        $current_balance = $row["Balance"];
        $current_id = $row["id"];
        $current_email = $row["email"];
        if ($current_balance < $money) {
            $_SESSION['add_balance'] = 1;
            header("location:inadequate_balance.php");
        } else {
            //update the tables for uer who is paying
            //update the table accoutn and also insert the row for the transcation
            $current_balance = $current_balance - $money;
            $update_balance = "UPDATE account set Balance=$current_balance WHERE Name='$nm'";
            if (!$conn->query($update_balance)) {
                header("location:../Login/error.html");
            }
            $module = "Money-Transfer";
            $company = "$credit_user";
            $DBCR = "Debit";
            $date_time = date('Y-m-d H:i:s');
            //entry in transcation table for user who is paying
            $transcation_entry_common = "INSERT INTO transcation(User_id,DBCR,Money,date_time,Company,Name)VALUES($current_id,'$DBCR',$money,'$date_time','$company','$nm')";
            if (!$conn->query($transcation_entry_common)) {
                header("location:../Login/error.html");
            }

            $get_max_id_query = "SELECT MAX(transcation_id) FROM transcation";
            $result = $conn->query($get_max_id_query);
            $row = $result->fetch_assoc();
            $maximum_transcation_id = $row["MAX(transcation_id)"];
            $_SESSION["t_id"] = $maximum_transcation_id;
            $_SESSION['money'] = $money;
            $_SESSION['module']=1;
            $_SESSION['credit_user']=$credit_user;
            $_SESSION['date_time'] = $date_time;
            $_SESSION['credit_user'] = $credit_user;
            //entry in user table
            $make_transcation_entry = "INSERT INTO $nm(Module,Company,DBCR,Money,date_time,transcation_id) VALUES('$module','$company','$DBCR',$money,'$date_time',$maximum_transcation_id)";
            if (!$conn->query($make_transcation_entry)) {
                header("location:../Login/error.html");
            }
            $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
            //message body for email
            $msg = "
         <html>
            <head>
             <title>Money-Transfer</title>
            </head>
            <body>
                <p>Hello " . $nm . " !!</p>
                <br/>
                <p>Your Money-Transfer For Rs <strong>$money</strong> is begin successfull into Account <strong>$credit_user</strong> on today at <strong>$date_time</strong></p>
                <p>Your Current Balance is : Rs <strong>$current_balance</strong>
              
                </br>
                <p><strong>Thanks For Using FastPay Web Appilication</strong></p>
                <p>With Regards:-Team <strong>FastPay</strong></p>
                <p>Good Day..!!</p>
                       
            </body>
          </html>";
            if (!mail($current_email, "Money-Transfer", $msg, $headers)) {
                header("location:../Login/error.html");
            }


            //make update for the user who is obtaining money
            $get_credit_balance = "SELECT id,Balance,email FROM account WHERE Name='$credit_user'";
            $result = $conn->query($get_credit_balance);
            $row = $result->fetch_assoc();
            $credit_balance = $row["Balance"];
            $credit_id = $row["id"];
            $credit_email = $row["email"];

            //update the balance of the credit user
            $credit_balance = $credit_balance + $money;
            $update_credit_user = "UPDATE account set Balance=$credit_balance WHERE Name='$credit_user' ";
            if (!$conn->query($update_credit_user)) {
                header("location:../Login/error.html");
            }
            //make entry in transcation table
            $credit_module = "Money-Transfer";
            $credit_company = "$nm";
            $credit_DBCR = "Credit";

            //entry in transcation table for user who is obtaining money
            $transcation_entry_common_for_credit_user = "INSERT INTO transcation(User_id,DBCR,Money,date_time,Company,Name)VALUES($credit_id,'$credit_DBCR',$money,'$date_time','$credit_company','$credit_user')";
            if (!$conn->query($transcation_entry_common_for_credit_user)) {
                header("location:../Login/error.html");
            }
            $credit_get_max_id_query = "SELECT MAX(transcation_id) FROM transcation";
            $result = $conn->query($get_max_id_query);
            $row = $result->fetch_assoc();
            $credit_maximum_transcation_id = $row["MAX(transcation_id)"];
            //entry in user table
            $make_transcation_entry_for_credit_user = "INSERT INTO $credit_user(Module,Company,DBCR,Money,date_time,transcation_id) VALUES('$credit_module','$credit_company','$credit_DBCR',$money,'$date_time',$maximum_transcation_id)";
            if (!$conn->query($make_transcation_entry_for_credit_user)) {
                header("location:../Login/error.html");
            }
            $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
            //message body for email
            $msg = "
         <html>
            <head>
             <title>Money-Tarnsfer</title>
            </head>
            <body>
                <p>Hello " . $credit_user . " !!</p>
                <br/>
               <p>Your Account has been credited by Rs <strong>$money</strong>,Payed by <strong>$nm</strong>
                   today at <strong>$date_time</strong>.</p>
                       <p>Your Current Balance is: Rs <strong>$credit_balance</strong></p>
                       
                <p><strong>Thanks For Using FastPay Web Appilication</strong></p>
                <p>With Regards:-Team <strong>FastPay</strong>
                <p>Good Day..!!</p>
                       
            </body>
          </html>";
            if (!mail($credit_email, "Money-Transfer", $msg, $headers)) {
                header("location:../Login/error.html");
            }


            $_SESSION['recharge_successfull'] = 1;
            $_SESSION['create_file']=1;
            header("location:congrats.php");
        }
    } else {
        $_SESSION['money_transfer_error'] = 1;
        $_SESSION['money_transfer_array'] = $money_arr;
        header("location:money_transfer.php");
    }
} else {
    if (!isset($_SESSION['auth_user'])) {
        header("location:../Login/login.php");
    } else {
        header("location:money_trensfer.php");
    }
}
?>