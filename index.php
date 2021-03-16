<?php
session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <title>FastPay</title>
        <style>
            .up{
                margin-top:-200px;
            }
            .up1{
                margin-top:10px;
                margin-bottom:20px;
            }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    

        <link href=" https://fonts.googleapis.com/css?family=Open+Sans:300,400,700 " rel="stylesheet">
        <link rel="stylesheet" href=" fonts/icomoon/style.css ">
        <link rel="stylesheet" href="  css/bootstrap.min.css">
        <link rel="stylesheet" href=" css/jquery-ui.css">
        <link rel="stylesheet" href=" css/owl.carousel.min.css ">
        <link rel="stylesheet" href=" css/owl.theme.default.min.css">
        <link rel="stylesheet" href=" css/owl.theme.default.min.css">
        <link rel="stylesheet" href=" css/jquery.fancybox.min.css">
        <link rel="stylesheet" href=" css/bootstrap-datepicker.css">
        <link rel="stylesheet" href=" fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" href=" css/aos.css">
        <link rel="stylesheet" href=" css/style.css">
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
            <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6 col-xl-2">
                            <h1 class="mb-0 site-logo"><a href="index.php" class="h2 mb-0">FastPay<span class="text-primary">.</span> </a></h1>
                        </div>
                        <div class="col-12 col-md-10 d-none d-xl-block">
                            <nav class="site-navigation position-relative text-right" role="navigation">
                                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                    <?php
                                    if (isset($_SESSION['auth_user'])) {
                                        echo "<li><a href='Account/show.php' class='nav-link'>Hello " . $_SESSION['auth_user'] . "</a></li>";
                                        echo "<li><a href='Transcation/show.php' class='nav-link'>Transactions-Histroy</a></li>";
                                        echo "<li><a href='#next' class='nav-link'>Our-Services</a></li>";

                                        echo "<li><a href='#contact-section' class='nav-link'>Contact Us</a></li>";
                                                      echo "<li><a href='Login/Logout.php' class='nav-link'>Logout</a></li>";
                                    } else {
                                        echo" <li><a href='Login/login.php' class='nav-link'>Login</a></li>";

                                        echo "<li><a href='Login/Register.php' class='nav-link'>Register</a></li>";
                                        echo "<li><a href='#services-section' class='nav-link'>Our Services</a></li>";

                                        echo "<li><a href='#contact-section' class='nav-link'>Contact Us</a></li>";
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>
                    </div>
                </div>
            </header>
            <div class="site-blocks-cover overlay" style="background-image:url('images/hero_2.jpg');" data-aos="fade" id="home-section">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-10 mt-lg-5 text-center">
                            <div class="single-text owl-carousel">
                                <div class="slide">
                                    <h1 class="text-uppercase" data-aos="fade-up">Payment Solutions</h1>
                                    <p class="mb-5 desc"  data-aos="fade-up" data-aos-delay="100">Reacharge and Pay bills here !</p>
                                    <div data-aos="fade-up" data-aos-delay="100">
                                    </div>
                                </div>
                                <div class="slide">
                                    <h1 class="text-uppercase" data-aos="fade-up">Recharge</h1>
                                    <p class="mb-5 desc"  data-aos="fade-up" data-aos-delay="100">Recharge your Mobile and Enjoy the services!</p>
                                </div>
                                <div class="slide">
                                    <h1 class="text-uppercase" data-aos="fade-up">Bill Payments</h1>
                                    <p class="mb-5 desc"  data-aos="fade-up" data-aos-delay="100">We are here for you instead of standing in queue pay your bills in simple setps!</p>
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
            <div class="up1"></div>
            <div class="site-section" id="next">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="">
                            <img src=" images/flaticon-svg/svg/001-wallet.svg" alt="Free Website Template by Free-Template.co" class="img-fluid w-25 mb-4">
                            <h3 class="card-title"><a href="Recharge/recharge.php">Mobile Recharge</a></h3>
                            <p>All prepaid Mobile Recharge with the best avail plans are here !!</p>
                        </div>
                        <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="100">
                            <img src=" images/flaticon-svg/svg/007-piggy-bank.svg"  alt="Free Website Template by Free-Template.co" class="img-fluid w-25 mb-4">
                            <h3 class="card-title"><a href="Money_Transfer/money_transfer.php">Money Transfer</a></h3>
                            <p>Tranfer Money From Account to Another Account here</p>
                        </div>
                        <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="200">
                            <img src=" images/flaticon-svg/svg/006-credit-card.svg " alt="Free Website Template by Free-Template.co" class="img-fluid w-25 mb-4">
                            <h3 class="card-title"><a href="Add/balance.php">Add Balance</a></h3>
                            <p>Insufficient Balance...!! Add balance into your Account before doing any transactions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="up"></div>
    <?php
    if (!isset($_SESSION['auth_user'])) {
        echo "<section class='site-section'>
        <div class='container'>
            <div class='row mb-5 justify-content-center'>
                <div class='col-md-7 text-center'>
                    <h2 class='section-title mb-3' data-aos='fade-up' data-aos-delay=''>How It Works</h2>
                    <p class='lead' data-aos='fade-up' data-aos-delay='100'>One individual may die for an idea, but that idea will, after his death, incarnate itself in a thousand lives.</p>
                </div>
            </div>
            <div class='row align-items-lg-center' >
                <div class='col-lg-6 mb-5' data-aos='fade-up' data-aos-delay=''>
                    <div class='owl-carousel slide-one-item-alt'>
                        <img src=' images/slide_1.jpg ' alt='Image' class='img-fluid'>
                        <img src= 'images/slide_2.jpg ' alt='Image' class='img-fluid'>
                        <img src='images/slide_3.jpg ' alt='Image' class='img-fluid'>
                    </div>
                    <div class='custom-direction'>
                        <a href='#' class='custom-prev'><span><span class='icon-keyboard_backspace'></span></span></a><a href='#' class='custom-next'><span><span class='icon-keyboard_backspace'></span></span></a>
                    </div>
                </div>
                <div class='col-lg-5 ml-auto' data-aos='fade-up' data-aos-delay='100'>
                    <div class='owl-carousel slide-one-item-alt-text'>
                        <div>
                            <h2 class='section-title mb-3'>01. Online Registration</h2>
                            <p>If you are coming to the website first time just register your self here and you can enjoy the functionality provided by us.</p>

                        </div>
                        <div>
                            <h2 class='section-title mb-3'>02. Get an approval</h2>
                            <p>A 6 digit code will be mailed to your gmail account ,just enter in when it is asked and hurray!! You are a user of FasttPay.</p>
                        </div>
                        <div>
                            <h2 class='section-title mb-3'>03. Functionality</h2>
                            <p>Do your money transcation anytime anywhere without carrying the cash with you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    
    <section class='site-section border-bottom bg-light' id='services-section'>
        <div class='container'>
            <div class='row mb-5'>
                <div class='col-12 text-center' data-aos='fade'>
                    <h2 class='section-title mb-3'>Our Services</h2>
                </div>
            </div>
            <div class='row align-items-stretch'>
                <div class='col-md-6 col-lg-4 mb-4 mb-lg-4' data-aos='fade-up'>
                    <div class='unit-4'>
                        <div class='unit-4-icon'>
                            <img src=' images/flaticon-svg/svg/money.svg ' width='1200' height='900' alt='Free Website Template by Free-Template.co' class='img-fluid w-25 mb-4'>
                        </div>
                        <br />
                        <div>
                            <h3 style='margin-top:-20px;'>Details</h3>
                            <p>You can view all your past transactions here on Fastpay !</p>

                        </div>
                    </div>
                </div>
                <div class='col-md-6 col-lg-4 mb-4 mb-lg-4' data-aos='fade-up' data-aos-delay='100'>
                    <div class='unit-4'>
                        <div class='unit-4-icon'>
                            <img src=' images/flaticon-svg/svg/006-credit-card.svg ' alt='Free Website Template by Free-Template.co' class='img-fluid w-25 mb-4'>
                        </div>
                        <div>
                            <h3>Recharge </h3>
                            <p>Recharge your mobile with the appropraite telecom company anytime anywhere</p>
                        </div>
                    </div>
                </div>
                <div class='col-md-6 col-lg-4 mb-4 mb-lg-4' data-aos='fade-up' data-aos-delay='200'>
                    <div class='unit-4'>
                        <div class='unit-4-icon'>
                            <img src='images/flaticon-svg/svg/002-rich.svg ' alt='Free Website Template by Free-Template.co' class='img-fluid w-25 mb-4'>
                        </div>
                        <div>
                            <h3>Money Transfer</h3>
                            <p>Send money from your account to another acccount with in a simple steps ,and save you time </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </a>"
        ;
    }
    ?>
    <?php
    if (isset($_SESSION['auth_user'])) {
        echo "<div class='site-section' id='next'>
        <div class='container'>
            <div class='row mb-5'>
                <div class='col-md-4 text-center' data-aos='fade-up' data-aos-delay=''>
                    <img src=' images/flaticon-svg/svg/transaction.svg'  class='img-fluid w-25 mb-4' style='margin-top:-3px;'>
                    <h3 class='card-title'><a href='Transcation/show.php'>View Transaction</a></h3>
                    <p>See your all transcation on FastPay !!</p>
                </div>
                <div class='col-md-4 text-center' data-aos='fade-up' data-aos-delay='100'>
                    <img src=' images/flaticon-svg/svg/user.svg'  alt='Free Website Template by Free-Template.co' class='img-fluid w-25 mb-3'>
                    <h3 class='card-title'><a href='Account/show.php'>View Account</a></h3>
                    <p>See your account details,you can also update the details</p>
                </div>
                <div class='col-md-4 text-center' data-aos='fade-up' data-aos-delay='200'>
                    <img src=' images/c.jpg' alt='Free Website Template by Free-Template.co' style='width:100px; height:100px; border-radius:100px;'>
                    <h3 class='card-title' style='margin-top:5px;'><a href='Comming/show.php'>Comming Soon</a></h3>
                    <p>See our new functionality on Fast-Pay</p>
                </div>
            </div>
        </div>
    </div>";
    }
    ?>

    <section class="site-section testimonial-wrap" id="testimonials-section" data-aos="fade">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title mb-3">Great Quotes</h2>
                </div>
            </div>
        </div>
        <div class="slide-one-item home-slider owl-carousel">
            <div>
                <div class="testimonial">

                    <blockquote class="mb-5">
                        <p>“When I despair, I remember that all through history the way of truth and love have always won. There have been tyrants and murderers, and for a time, they can seem invincible, but in the end, they always fall. Think of it--always.” </p>
                    </blockquote>

                    <figure class="mb-4 d-flex align-items-center justify-content-center">
                        <div><img src=" images/gandhi.jpg " alt="Image" class="w-50 img-fluid mb-3"></div>
                        <p>Mahatma Gandhiji</p>
                    </figure>
                </div>
            </div>
            <div>
                <div class="testimonial">
                    <blockquote class="mb-5">
                        <p>The negligence of a few could easily send a ship to the bottom, but if it has the wholehearted co-operation of all on board it can be safely brought to part.</p>
                    </blockquote>
                    <figure class="mb-4 d-flex align-items-center justify-content-center">
                        <div><img src=" images/sardar.jpg " alt="Image" class="w-50 img-fluid mb-3"></div>
                        <p>Sardar VallabhBhai patel</p>
                    </figure>
                </div>
            </div>
            <div>
                <div class="testimonial">
                    <blockquote class="mb-5">
                        <p>The negligence of a few could easily send a ship to the bottom, but if it has the wholehearted co-operation of all on board it can be safely brought to part.</p>
                    </blockquote>
                    <figure class="mb-4 d-flex align-items-center justify-content-center">
                        <div><img src=" images/narendra.jpg " alt="Image" class="w-50 img-fluid mb-3"></div>
                        <p>Narendra Modi</p>
                    </figure>
                </div>
            </div>
            <div>
                <div class="testimonial">
                    <blockquote class="mb-5">
                        <p>Men, money and materials cannot by themselves bring victory or freedom. We must have the motive-power that will inspire us to brave deeds and heroic exploits.</p>
                    </blockquote>
                    <figure class="mb-4 d-flex align-items-center justify-content-center">
                        <div><img src=" images/subhash.jpg " alt="Image" class="w-50 img-fluid mb-3"></div>
                        <p>Subhash Chandra Bose</p>
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section bg-light" id="contact-section" data-aos="fade">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title mb-3">Contact Us</h2>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-4 text-center">
                    <p class="mb-4">
                        <span class="icon-room d-block h2 text-primary"></span>
                        <span>DDU,Nadiad</span>
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <p class="mb-4">
                        <span class="icon-phone d-block h2 text-primary"></span>
                    <ul>
                        <li>8140746417</li>
                        <li>6354088874</li>
                        <li>9265573093</li>
                    </ul>
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <p class="mb-0">
                        <span class="icon-mail_outline d-block h2 text-primary"></span>
                    <p>fastpay196@gmail.com</p>
                    </p>
                </div>
            </div>
            <div class="row" id="contact-section">
                <div class="col-md-12 mb-5">
                    <form action="Contact.php" class="p-5 bg-white" method="POST">
                        <h2 class="h4 text-black mb-5">Contact Form</h2> 
                        <div class="row form-group">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="text-black" for="fname">First Name</label>
                                <input type="text" id="fname" class="form-control" name="first_name" required/>
                            </div>
                            <div class="col-md-6">
                                <label class="text-black" for="lname">Last Name</label>
                                <input type="text" id="lname" class="form-control" name="last_name" required/>
                            </div>
                        </div>
                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label> 
                                <input type="email" id="email" class="form-control" name="email" required/>
                            </div>
                        </div>
                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="subject">Subject</label> 
                                <input type="subject" id="subject" class="form-control" name="subject" required/>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="message">Message</label> 
                                <textarea name="message"  id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..." required></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit"  name="Send_message" value="Send Message" class="btn btn-primary btn-md text-white">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-5">
                            <h2 class="footer-heading mb-4">About Us</h2>
                            <p>We are studying in DDU,Nadiad in Computer Engineering Department.This is the web Devlopment project developed by us for our semester project. </p>
                            <p>We hope that you liked our project .</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h2 class="footer-heading mb-4">&nbsp; &nbsp; &nbsp;Developed By</h2>
                    <ul>
                        <li>Saurav Omprakash laddha</li>
                        <li>Shyam DilipBhai Makwana</li>
                        <li>Jay NileshKumar Mangukiya</li>
                    </ul>
                </div>
            </div>
            <p><h2><center>Thanks for Visting ! </h2></center></p>
        </div>
    </footer>
</div> <!-- .site-wrap -->
<script src=" js/jquery-3.3.1.min.js "></script>
<script src=" js/jquery-ui.js "></script>
<script src=" js/popper.min.js "></script>
<script src=" js/bootstrap.min.js "></script>
<script src=" js/owl.carousel.min.js "></script>
<script src=" js/jquery.countdown.min.js "></script>
<script src=" js/jquery.easing.1.3.js "></script>
<script src=" js/aos.js "></script>
<script src=" js/jquery.fancybox.min.js "></script>
<script src=" js/jquery.sticky.js "></script>
<script src=" js/isotope.pkgd.min.js "></script>
<script src=" js/main.js "></script>
</body>
</html>