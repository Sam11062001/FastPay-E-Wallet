<?php
session_start();
include("pdf.php");
if (isset($_SESSION['create_file'])) {
    unset($_SESSION['create_file']);
    $filename = $_SESSION['t_id'] . '.pdf';
    $html_code = "
         <html lang='en'>
    <head>
        <meta charset='utf-8'>

        <title>Team-FastPay</title>
        
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
        <link href='http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
        <style type='text/css'>
           .body{
            font-size:20px;
            }
            .row{
                margin-top:60px;
            }
            /*Invoice*/
            .invoice .top-left {
                font-size:65px;
                color:#3ba0ff;
            }

            .invoice .top-right {
                text-align:right;
                padding-right:20px;
            }

            .invoice .table-row {
                margin-left:-15px;
                margin-right:-15px;
                margin-top:25px;
            }

            .invoice .payment-info {
                font-weight:500;
            }

            .invoice .table-row .table>thead {
                border-top:1px solid #ddd;
            }

            .invoice .table-row .table>thead>tr>th {
                border-bottom:none;
            }

            .invoice .table>tbody>tr>td {
                padding:8px 20px;
            }

            .invoice .invoice-total {
                margin-right:-10px;
                font-size:16px;
            }

            .invoice .last-row {
                border-bottom:1px solid #ddd;
            }

            .invoice-ribbon {
                width:85px;
                height:88px;
                overflow:hidden;
                position:absolute;
                top:-1px;
                right:14px;
            }

            .ribbon-inner {
                text-align:center;
                -webkit-transform:rotate(45deg);
                -moz-transform:rotate(45deg);
                -ms-transform:rotate(45deg);
                -o-transform:rotate(45deg);
                position:relative;
                padding:7px 0;
                left:-5px;
                top:11px;
                width:120px;
                background-color:#66c591;
                font-size:15px;
                color:#fff;
            }

            .ribbon-inner:before,.ribbon-inner:after {
                content:'';
                position:absolute;
            }

            .ribbon-inner:before {
                left:0;
            }

            .ribbon-inner:after {
                right:0;
            }

            @media(max-width:575px) {
                .invoice .top-left,.invoice .top-right,.invoice .payment-details {
                    text-align:center;
                }

                .invoice .from,.invoice .to,.invoice .payment-details {
                    float:none;
                    width:100%;
                    text-align:center;
                    margin-bottom:25px;
                }

                .invoice p.lead,.invoice .from p.lead,.invoice .to p.lead,.invoice .payment-details p.lead {
                    font-size:22px;
                }

                .invoice .btn {
                    margin-top:10px;
                }
            }

            @media print {
                .invoice {
                    width:900px;
                    height:800px;
                }
            }
        </style>
       
    </head>
    <body>
   
        
            
                <div class='container bootstrap snippets'>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <div class='panel panel-default invoice' id='invoice'>
                                <div class='panel-body'>
                                    <div class='invoice-ribbon'><div class='ribbon-inner'>PAID</div></div>
                                    <div class='row'>

                                        <div class=col-sm-6 top-left' style='margin-top:-80px;'>
                                            <i class='fa fa-rocket' ></i>
                                        </div>

                                        <h2 style='margin-left:10px;margin-top:-10px;'>FASTPAY-INVOICE</h3>
                                        <h5>" . $_SESSION["date_time"] . "

                                    </div>
                                   
                                        <hr>
                                        <table class='table'>
                                            <thead class='thead-dark'>
                                                <tr>
                                                    <th scope='col'><h2>Money-Transfer Details</h2></th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope='row'>
                                            <h2 style='text-ident:5em;'>Transcation ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:" . $_SESSION['t_id'] . " </h2>
                                            </th>

                                            </tr>
                                            <tr>
                                                <th scope='row'>
                                            <h2 style='text-ident:5em;'>From  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:" . $_SESSION['auth_user'] . " </h2>
                                            </th>
                                            </tr>
                                            <tr>
                                                <th scope='row'>
                                            <h2 style='text-ident:5em;'>Amount Paid &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:" . $_SESSION['money'] . "  Rs" . " </h2>
                                            </th>
                                            </tr>
                                            <tr>
                                                <th scope='row'>
                                            <h2 style='text-ident:5em;'>To  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:" . $_SESSION['credit_user'] . "</h2>
                                            </th>
                                            </tr>

                                          


                                            </tbody>
                                        </table>


                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </form>
      

        <script src='http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>

    </body>
</html>";
    $pdf = new Pdf();
    $pdf->loadHtml($html_code);
    $pdf->setPaper('A4', 'landscape');
    $pdf->render();
    $save = $pdf->output();
    $location = "../Invoices/" . $_SESSION['auth_user'] . "/" . $filename;
    file_put_contents($location, $save);
     if(isset($_SESSION['module'])){
        $url_save="../Invoices/" . $_SESSION['credit_user'] . "/" . $filename;
        file_put_contents($url_save,$save);
        unset($_SESSION['module']);
    }
    $_SESSION['download_click'] = $pdf;
}
if (isset($_POST['sendEmail'])) {
    $filename = $_SESSION['t_id'] . '.pdf';
    $html_code = "
               <html lang='en'>
    <head>
        <meta charset='utf-8'>

        <title>Team-FastPay</title>
        
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
        <link href='http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
        <style type='text/css'>
           
            .row{
                margin-top:60px;
            }
            /*Invoice*/
            .invoice .top-left {
                font-size:65px;
                color:#3ba0ff;
            }

            .invoice .top-right {
                text-align:right;
                padding-right:20px;
            }

            .invoice .table-row {
                margin-left:-15px;
                margin-right:-15px;
                margin-top:25px;
            }

            .invoice .payment-info {
                font-weight:500;
            }

            .invoice .table-row .table>thead {
                border-top:1px solid #ddd;
            }

            .invoice .table-row .table>thead>tr>th {
                border-bottom:none;
            }

            .invoice .table>tbody>tr>td {
                padding:8px 20px;
            }

            .invoice .invoice-total {
                margin-right:-10px;
                font-size:16px;
            }

            .invoice .last-row {
                border-bottom:1px solid #ddd;
            }

            .invoice-ribbon {
                width:85px;
                height:88px;
                overflow:hidden;
                position:absolute;
                top:-1px;
                right:14px;
            }

            .ribbon-inner {
                text-align:center;
                -webkit-transform:rotate(45deg);
                -moz-transform:rotate(45deg);
                -ms-transform:rotate(45deg);
                -o-transform:rotate(45deg);
                position:relative;
                padding:7px 0;
                left:-5px;
                top:11px;
                width:120px;
                background-color:#66c591;
                font-size:15px;
                color:#fff;
            }

            .ribbon-inner:before,.ribbon-inner:after {
                content:'';
                position:absolute;
            }

            .ribbon-inner:before {
                left:0;
            }

            .ribbon-inner:after {
                right:0;
            }

            @media(max-width:575px) {
                .invoice .top-left,.invoice .top-right,.invoice .payment-details {
                    text-align:center;
                }

                .invoice .from,.invoice .to,.invoice .payment-details {
                    float:none;
                    width:100%;
                    text-align:center;
                    margin-bottom:25px;
                }

                .invoice p.lead,.invoice .from p.lead,.invoice .to p.lead,.invoice .payment-details p.lead {
                    font-size:22px;
                }

                .invoice .btn {
                    margin-top:10px;
                }
            }

            @media print {
                .invoice {
                    width:900px;
                    height:800px;
                }
            }
        </style>
       
    </head>
    <body>
   
        
            
                <div class='container bootstrap snippets'>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <div class='panel panel-default invoice' id='invoice'>
                                <div class='panel-body'>
                                    <div class='invoice-ribbon'><div class='ribbon-inner'>PAID</div></div>
                                    <div class='row'>

                                        <div class=col-sm-6 top-left' style='margin-top:-80px;'>
                                            <i class='fa fa-rocket' ></i>
                                        </div>

                                        <h2 style='margin-left:10px;margin-top:-10px;'>FASTPAY-INVOICE</h3>
                                        <h5>" . $_SESSION["date_time"] . "

                                    </div>
                                   
                                        <hr>
                                        <table class='table'>
                                            <thead class='thead-dark'>
                                                <tr>
                                                    <th scope='col'><h2>Money-Transfer Details</h2></th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope='row'>
                                            <h2 style='text-ident:5em;'>Transcation ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:" . $_SESSION['t_id'] . " </h2>
                                            </th>

                                            </tr>
                                            <tr>
                                                <th scope='row'>
                                            <h2 style='text-ident:5em;'>From  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:" . $_SESSION['auth_user'] . " </h2>
                                            </th>
                                            </tr>
                                            <tr>
                                                <th scope='row'>
                                            <h2 style='text-ident:5em;'>Amount Paid &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:" . $_SESSION['money'] . "  Rs" . " </h2>
                                            </th>
                                            </tr>
                                            <tr>
                                                <th scope='row'>
                                            <h2 style='text-ident:5em;'>To  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:" . $_SESSION['credit_user'] . "</h2>
                                            </th>
                                            </tr>

                                          


                                            </tbody>
                                        </table>


                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </form>
      

        <script src='http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>

    </body>
</html>";
    $pdf = new Pdf();
    $pdf->loadHtml($html_code);
    $pdf->setPaper('A4', 'landscape');
    $pdf->render();
    $pdf->stream();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Team-FastPay</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style type="text/css">
            body{margin-top:20px;
                 background-color: lavenderblush;
                 background-size:cover;
                 animation: 15;
            }
            .row{
                margin-top:60px;
            }
            /*Invoice*/
            .invoice .top-left {
                font-size:65px;
                color:#3ba0ff;
            }

            .invoice .top-right {
                text-align:right;
                padding-right:20px;
            }

            .invoice .table-row {
                margin-left:-15px;
                margin-right:-15px;
                margin-top:25px;
            }

            .invoice .payment-info {
                font-weight:500;
            }

            .invoice .table-row .table>thead {
                border-top:1px solid #ddd;
            }

            .invoice .table-row .table>thead>tr>th {
                border-bottom:none;
            }

            .invoice .table>tbody>tr>td {
                padding:8px 20px;
            }

            .invoice .invoice-total {
                margin-right:-10px;
                font-size:16px;
            }

            .invoice .last-row {
                border-bottom:1px solid #ddd;
            }

            .invoice-ribbon {
                width:85px;
                height:88px;
                overflow:hidden;
                position:absolute;
                top:-1px;
                right:14px;
            }

            .ribbon-inner {
                text-align:center;
                -webkit-transform:rotate(45deg);
                -moz-transform:rotate(45deg);
                -ms-transform:rotate(45deg);
                -o-transform:rotate(45deg);
                position:relative;
                padding:7px 0;
                left:-5px;
                top:11px;
                width:120px;
                background-color:#66c591;
                font-size:15px;
                color:#fff;
            }

            .ribbon-inner:before,.ribbon-inner:after {
                content:"";
                position:absolute;
            }

            .ribbon-inner:before {
                left:0;
            }

            .ribbon-inner:after {
                right:0;
            }

            @media(max-width:575px) {
                .invoice .top-left,.invoice .top-right,.invoice .payment-details {
                    text-align:center;
                }

                .invoice .from,.invoice .to,.invoice .payment-details {
                    float:none;
                    width:100%;
                    text-align:center;
                    margin-bottom:25px;
                }

                .invoice p.lead,.invoice .from p.lead,.invoice .to p.lead,.invoice .payment-details p.lead {
                    font-size:22px;
                }

                .invoice .btn {
                    margin-top:10px;
                }
            }

            @media print {
                .invoice {
                    width:900px;
                    height:800px;
                }
            }
        </style>
        <script type="text/javascript">
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.save();

                document.body.innerHTML = originalContents;
            }
        </script>
    </head>
    <body>
        <audio autoplay src="../Recharge/success.wav"></audio>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="printableArea">
            <form action="congrats.php" method="POST">
                <div class="container bootstrap snippets">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default invoice" id="invoice">
                                <div class="panel-body">
                                    <div class="invoice-ribbon"><div class="ribbon-inner">PAID</div></div>
                                    <div class="row">

                                        <div class="col-sm-6 top-left" style="margin-top:-80px;">
                                            <i class="fa fa-rocket" ></i>
                                        </div>

                                        <div class="col-sm-6 top-right">
                                            <h2 class="marginright" style="margin-top:-50px;margin-right:30px;font-family:serif;">FASTPAY-INVOICE</h3>
                                                <span class="marginright" style="margin-right:30px;font-size:15px;"><?php echo date('Y-m-d'); ?></span>
                                        </div>

                                    </div>
                                    <h2 style="color:darkslateblue">Congratulation..!!You have Succesfully made a transcation with US.
                                        <hr>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col"><h2>Recharge Details</h2></th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">
                                            <h2 style="text-ident:5em;">Transcation ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $_SESSION['t_id']; ?> </h2>
                                            </th>

                                            </tr>
                                            <tr>
                                                <th scope="row">
                                            <h2 style="text-ident:5em;">From  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $_SESSION['auth_user']; ?> </h2>
                                            </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                            <h2 style="text-ident:5em;">Amount Paid &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $_SESSION['money'] . "  Rs"; ?> </h2>
                                            </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                            <h2 style="text-ident:5em;">To  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $_SESSION['credit_user']; ?> </h2>
                                            </th>
                                            </tr>

                                            <tr>
                                                <th scope="row">
                                            <h2 style="text-ident:5em;">Date-Time  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $_SESSION['date_time']; ?> </h2>
                                            </th>
                                            </tr>


                                            </tbody>
                                        </table>


                                </div>


                                <input style="margin-left:10px; width:100px; height:50px; border-radius:20px; background-color:darkslateblue;font-size:15px;color:white;margin-bottom:10px;margin-left:452px;" type="submit" name="sendEmail" value="Download"/>
                                <input style="margin-left:10px; width:100px; height:50px; border-radius:20px; background-color:darkslateblue; font-size:15px;color:white;" type="button" onclick="redirect()" value="Home"/>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            function redirect() {
                var url = "../index.php";
                window.location.href = url;
            }
            ;
        </script>

    </body>
</html>