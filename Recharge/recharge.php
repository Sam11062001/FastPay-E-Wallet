<?php
session_start();
if (!isset($_SESSION['auth_user'])) {
    header("location:../Login/please_login.php");
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>FastPay</title>
        <style>
            .container1{
                margin-left:50px;
                margin-top:-20px;
            }
            .link{
                font-color:white;
                margin-right:50px;
                font-size: 20px;
                color:white;
                float:right;
                display: inline;
            }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
        <link href=" https://fonts.googleapis.com/css?family=Open+Sans:300,400,700 " rel="stylesheet">
        <link rel="stylesheet" href="../fonts/icomoon/style.css ">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href=" ../css/jquery-ui.css">
        <link rel="stylesheet" href=" ../css/owl.carousel.min.css ">
        <link rel="stylesheet" href=" ../css/owl.theme.default.min.css">
        <link rel="stylesheet" href=" ../css/owl.theme.default.min.css">
        <link rel="stylesheet" href=" ../css/jquery.fancybox.min.css">
        <link rel="stylesheet" href=" ../css/bootstrap-datepicker.css">
        <link rel="stylesheet" href=" ../fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" href=" ../css/aos.css">
        <link rel="stylesheet" href=" ../css/style.css">
        <link rel = "stylesheet"
              href = "https://fonts.googleapis.com/icon?family=Material+Icons">
        <script type = "text/javascript"
        src = "https://code.jquery.com/jquery-2.1.1.min.js"></script> 
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
        </script> 
        <script>
            $(document).ready(function () {
                $('select').material_select();
            });
        </script>
        <link rel = "stylesheet"
              href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <div id="overlayer"></div>
        <div class="loader">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="site-wrap">
            <div class="site-mobile-menu site-navbar-target">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>
            <header class="site-navbar js-sticky-header site-navbar-target" role="banner" style="height: 80px;">
                <div class="container1" >
                    <div class="sticky">
                        <h1 class="mb-0 site-logo" ><a href="recharge.php" class="h1 mb-0">Online Recharge<span class="text-primary">.</span> </a></h1>
                    </div>
                </div>
            </header>
            <div class="site-blocks-cover overlay" style="background-image:url('../images/hero_2.jpg');" data-aos="fade" id="home-section">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-10 mt-lg-5 text-center">
                            <div class="single-text owl-carousel">
                                <div class="slide">
                                    <p class="mb-5 desc"  style="font-size:50px; margin-top:50px;" data-aos="fade-up" data-aos-delay="100">Have Unlimted Recharge Anytime and Anywhere on FastPay !</p>
                                    <div data-aos="fade-up" data-aos-delay="100">
                                    </div>
                                </div>
                                <div class="slide">
                                    <p class="mb-5 desc"  data-aos="fade-up" style="font-size:50px; margin-top:50px;"data-aos-delay="100">Recharge your Mobile and Enjoy the services!</p>
                                </div>
                                <div class="slide">
                                    <p class="mb-5 desc"  data-aos="fade-up" style="font-size:50px; margin-top:50px;" data-aos-delay="100">Recharge Your Mobile with our best Plan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#next" class="mouse smoothscroll">
                    <span class="mouse-icon">
                        <span class="mouse-wheel"></span>
                    </span>
                </a>
            </div>
            <div id="next" class="form">

                <section class="site-section bg-light" id="contact-section" data-aos="fade">

                    <div class="row">
                        <div class="col-md-12 mb-5">

                            <form action="validate_recharge.php" class="p-5 bg-white" method="POST">

                                <h2 class="h4 text-black mb-5" >Fill Following details</h2> 
                                <div class="errors" style="border: 1px solid red; border-radius: 20px; margin-bottom:20px; margin-top:-20px;">
                                     
                                    <?php
                                    if (isset($_SESSION['recharge_error'])) {
                                        
                                        foreach ($_SESSION['recharge_array'] as $value) {
                                            echo "<li>";
                                            echo "<h2 class='h4 text-danger mb-5' >->$value</h2>";
                                            echo "</li>";
                                        }
                                        unset($_SESSION['recharge_error']);
                                    }
                                    ?>
                                </div>
                                <div class = "row form-group">
                                    <div class = "col-md-12">
                                        <label class = "text-black" for = "fname" style = "font-size:15px;">&nbsp;
                                            Select Your Operator</label>
                                        <select class = "form-control" name = "operator">
                                            <option value = "none">Select Your Operator</option>
                                            <option value = "Jio">Jio</option>
                                            <option value = "Idea">Idea</option>
                                            <option value = "Airtel">Airtel</option>
                                            <option value = "Vodafone">Vodafone</option>
                                        </select>
                                    </div>


                                </div>

                                <div class = "row form-group">

                                    <div class = "col-md-12">
                                        <label class = "text-black" for = "email" style = "font-size:15px;">Select Your Circle</label>
                                        <select class = "form-control" name ="circle">
                                            <option value = "none">Select Your Circle</option>
                                            <option value = "Andhra Pradesh">Andhra Pradesh</option>
                                            <option value = "Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value = "Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value = "Assam">Assam</option>
                                            <option value = "Bihar">Bihar</option>
                                            <option value = "Chandigarh">Chandigarh</option>
                                            <option value = "Chhattisgarh">Chhattisgarh</option>
                                            <option value = "Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                            <option value = "Daman and Diu">Daman and Diu</option>
                                            <option value = "Delhi">Delhi</option>
                                            <option value = "Lakshadweep">Lakshadweep</option>
                                            <option value = "Puducherry">Puducherry</option>
                                            <option value = "Goa">Goa</option>
                                            <option value = "Gujarat">Gujarat</option>
                                            <option value = "Haryana">Haryana</option>
                                            <option value = "Himachal Pradesh">Himachal Pradesh</option>
                                            <option value = "Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value = "Jharkhand">Jharkhand</option>
                                            <option value = "Karnataka">Karnataka</option>
                                            <option value = "Kerala">Kerala</option>
                                            <option value = "Madhya Pradesh">Madhya Pradesh</option>
                                            <option value = "Maharashtra">Maharashtra</option>
                                            <option value = "Manipur">Manipur</option>
                                            <option value = "Meghalaya">Meghalaya</option>
                                            <option value = "Mizoram">Mizoram</option>
                                            <option value = "Nagaland">Nagaland</option>
                                            <option value = "Odisha">Odisha</option>
                                            <option value = "Punjab">Punjab</option>
                                            <option value = "Rajasthan">Rajasthan</option>
                                            <option value = "Sikkim">Sikkim</option>
                                            <option value = "Tamil Nadu">Tamil Nadu</option>
                                            <option value = "Telangana">Telangana</option>
                                            <option value = "Tripura">Tripura</option>
                                            <option value = "Uttar Pradesh">Uttar Pradesh</option>
                                            <option value = "Uttarakhand">Uttarakhand</option>
                                            <option value = "West Bengal">West Bengal</option>
                                        </select>
                                    </div>
                                </div>

                                <div class = "row form-group">

                                    <div class = "col-md-12">
                                        <label class = "text-black" for = "subject" style = "font-size:15px;">Select Your Plan</label>
                                        <select class = "form-control" name = "recharge">
                                            <optgroup label = "Top-Up">
                                                <option value = "100">100</option>
                                                <option value = "500">500</option>
                                            </optgroup>
                                            <optgroup label = "Special">
                                                <option value = "1000">1000</option>
                                                <option value = "2000">2000</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <div class = "row form-group">
                                    <div class = "col-md-12">
                                        <label class = "text-black" for = "message" style = "font-size:15px;">Enter Mobile Number</label>
                                        <input type = "text" name = "recharge_mobile" placeholder = "Enter 10 digit mobile number" pattern = "[6789]{1}[0-9]{9}" class = "form-control" required/>
                                    </div>
                                </div>

                                <div class = "row form-group">
                                    <div class = "col-md-12">
                                        <input type = "submit" name ="done_recharge" value = "Proceed" class = "btn btn-primary btn-md text-white">
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </section>
            </div>
        </div>
        <footer class = "site-footer">
            <div class = "container">
                <div class = "row">
                    <div class = "col-md-9">
                        <div class = "row">
                            <div class = "col-md-5">
                                <h2 class = "footer-heading mb-4">About Us</h2>
                                <p>We are studying in DDU, Nadiad in Computer Engineering Department.This is the web Devlopment project developed by us for our semester project. </p>
                                <p>We hope that you liked our project .</p>

                            </div>
                        </div>
                    </div>
                    <div class = "col-md-3">
                        <h2 class = "footer-heading mb-4">&nbsp;
                            &nbsp;
                            &nbsp;
                            Developed By</h2>
                        <ul>
                            <li>Saurav Omprakash laddha</li>
                            <li>Shyam DilipBhai Makwana</li>
                            <li>Jay NileshBhai Mangukiya</li>
                        </ul>
                    </div>
                </div>
            </div>
            <p><center><h1 style = "color:white;">FastPay<h1></center></p>
                        <div class = "link">
                            <ul >
                                <li><a href = "../Login/Logout.php">Logout</a></li>
                                <li><a href = "../index.php">Home</a>
                            </ul>
                        </div>
                        </footer>
                        <script src = " ../js/jquery-3.3.1.min.js "></script>
                        <script src=" ../js/jquery-ui.js "></script>
                        <script src=" ../js/popper.min.js "></script>
                        <script src=" ../js/bootstrap.min.js "></script>
                        <script src=" ../js/owl.carousel.min.js "></script>
                        <script src=" ../js/jquery.countdown.min.js "></script>
                        <script src=" ../js/jquery.easing.1.3.js "></script>
                        <script src=" ../js/aos.js "></script>
                        <script src=" ../js/jquery.fancybox.min.js "></script>
                        <script src=" ../js/jquery.sticky.js "></script>
                        <script src=" ../js/isotope.pkgd.min.js "></script>
                        <script src=" ../js/main.js "></script>
                        </body>
                        </html>