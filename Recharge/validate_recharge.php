<?php

session_start();
$conn = new mysqli("localhost:3307", "root", "", "fastpay");
// Check connection
if ($conn->connect_error) {
    header("location:../Login/error.html");
}
$arr = array();
if (isset($_POST['done_recharge'])) {

    $operator = $_POST['operator'];
    //if operator is not selected
    if ($operator == "none") {
        array_push($arr, "Please Select Your Operator");
    }
    //if circle is not selected
    $circle = $_POST['circle'];
    if ($circle == "none") {
        array_push($arr, "Please Select Your Circle");
    }
    $money = $_POST['recharge'];
    $mobile_number = $_POST['recharge_mobile'];
    if (count($arr) == 0) {
        $nm = $_SESSION['auth_user'];
        $get_current_balance = "SELECT id,Balance,email FROM account WHERE Name='$nm'";
        $result = $conn->query($get_current_balance);
        $row = $result->fetch_assoc();
        $current_balance = $row["Balance"];
        $current_id = $row["id"];
        $current_email = $row["email"];
        if ($current_balance < $money) {
            $_SESSION['add_balance']=1;
            header("location:inadequate_balance.php");
        } else {
            //update the table accoutn and also insert the row for thr transcation
            $current_balance = $current_balance - $money;
            $update_balance = "UPDATE account set Balance=$current_balance WHERE Name='$nm'";
            if (!$conn->query($update_balance)) {
                header("location:../Login/error.html");
            }
            $module = "Recharge";
            $company = $operator;
            $DBCR = "Debit";
            $date_time = date('Y-m-d H:i:s');
            //entry in transcation table
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
            $_SESSION['mobile_number'] = $mobile_number;
            $_SESSION['date_time'] = $date_time;
            $_SESSION['operator']=$operator;
            //entry in user table
            $make_transcation_entry = "INSERT INTO $nm(Module,Company,DBCR,Money,date_time,transcation_id) VALUES('$module','$company','$DBCR',$money,'$date_time',$maximum_transcation_id)";
            if (!$conn->query($make_transcation_entry)) {
                header("location:../Login/error.html");
            }
            //entry in company table
            $DBCR_company="Credit";
            $company_table_entry = "INSERT INTO $company(id,Name,DBCR,Money,date_time)VALUES($maximum_transcation_id,'$nm','$DBCR_company',$money,'$date_time')";
            if (!$conn->query($company_table_entry)) {
                header("location:../Login/error.html");
            }

            $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
            //message body for email
            $msg = "
         <html>
            <head>
             <title>Otp Verification</title>
            </head>
            <body>
                <p>Hello " . $nm . " !!</p>
                <br/>
                <p>Recharge Done..!! </p>
                
                
               <p>Recharge Details:</p>
               
               <p>Mobile Number:<strong>$mobile_number</strong></p>
               
                <p>Amount:<strong>$money</strong></p>
               
                <p>Operator:<strong>$operator</strong></p>
                </br>
                <p><strong>Thanks For Using FastPay Web Appilication</strong></p>
                <p>Good Day..!!</p>
                       
            </body>
          </html>";
            if (!mail($current_email, "Recharge Done", $msg, $headers)) {
                header("location:../Login/error.html");
            }
            $_SESSION['recharge_successfull'] = 1;
            $conn->close();
            $_SESSION['create_file']=1;
            header("location:congrats.php");
        }
    } else {
        $_SESSION['recharge_error'] = 1;
        $_SESSION['recharge_array'] = $arr;
        header("location:recharge.php");
    }
} else {
    if (!isset($_SESSION['auth_user'])) {
        header("location:../Login/login.php");
    } else {
        header("location:recharge.php");
    }
}
?>