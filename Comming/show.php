<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>

            body {font-family: Verdana, sans-serif;
            overflow : hidden;}
            .mySlides {display: none;}

            /* Position text in the top-left corner */
            .topleft {
                position: absolute;
                top: 0;
                left: 16px;

                color:white;
                font-size:40px;
            }

            /* Slideshow container */
            .slideshow-container {
                max-width: 100%;
                max-height: 100%;
            }
            img{
                width:100%;
                height: :100%;
            }
            /* Caption text */
            .text {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                color:white;
                font-size:60px;
            }
            }

            /* Number text (1/3 etc) */
            .numbertext {
                color: #f2f2f2;
                font-size: 12px;
                padding: 8px 12px;
                position: absolute;
                top: 0;
            }

            /* The dots/bullets/indicators */
            .dot {
                height: 15px;
                width: 15px;
                margin: 0 2px;
                background-color: #bbb;
                border-radius: 50%;
                display: inline-block;
                transition: background-color 0.6s ease;
            }

            .active {
                background-color: #717171;
            }

            /* Fading animation */
            .fade {
                -webkit-animation-name: fade;
                -webkit-animation-duration: 1.5s;
                animation-name: fade;
                animation-duration: 1.5s;
            }

            @-webkit-keyframes fade {
                from {opacity: .4} 
                to {opacity: 1}
            }

            @keyframes fade {
                from {opacity: .4} 
                to {opacity: 1}
            }

            /* On smaller screens, decrease text size */
            @media only screen and (max-width: 300px) {
                .text {font-size: 11px}
            }
            a{
                color:white;
                text-decoration:none;
            }
            hr {
                margin: auto;
                width: 40%;
            }
            .line{
                width:100%;
                height:10px;
                border-bottom:1px solid white;
            }
        </style>
        <title>Coming Soon !</title>
    </head>
    <body style="background-color:black;">



        <div class="slideshow-container">

            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <div class="topleft">
                    <p><a href="../index.php">FastPay</a></p>
                    <div clas="line"></div>
                </div>
                <img src="img1.jpg" style="width:100%">
                <div class="text">Book Hotels
                    <hr>
                    <p id="demo" style="font-size:30px"></p></div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <div class="topleft">
                    <p><a href="../index.php">FastPay</a></p>
   <div clas="line"></div>
                </div>
                <img src="img2.jpg" style="width:100%">
                <div class="text">Book Train Tickets
                    <hr>
                    <p id="demo1" style="font-size:30px"></p></div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <div class="topleft">
                    <p><a href="../index.php">FastPay</a></p>
                       <div clas="line"></div>
                </div>
                <img src="img3.jpg" style="width:100%">
                <div class="text">Book Movie Tickets
                    <hr>
                    <p id="demo2" style="font-size:30px"></p></div>
            </div>

        </div>
        <br>

        <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span> 
        </div>

        <script>
            var slideIndex = 0;
            showSlides();

            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                setTimeout(showSlides, 3000); // Change image every 2 seconds
            }


            // Set the date we're counting down to
            var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

// Update the count down every 1 second
            var x = setInterval(function () {

                // Get todays date and time
                var now = new Date().getTime();

                // Find the distance between now an the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in an element with id="demo"
                document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                        + minutes + "m " + seconds + "s ";
                document.getElementById("demo1").innerHTML = days + "d " + hours + "h "
                        + minutes + "m " + seconds + "s ";
                document.getElementById("demo2").innerHTML = days + "d " + hours + "h "
                        + minutes + "m " + seconds + "s ";

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                }
            }, 1000);</script>
    </body>
</html> 
