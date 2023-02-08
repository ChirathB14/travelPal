<?php
$title = "Contact us";
require_once("./inc/header.php");
?>

<head>
    <link rel="stylesheet" href="./css/main.css" type="text/css">
    <link rel="stylesheet" href="./css/contactus.css" type="text/css">
</head>

    <img src="./assets/contactusimg.png" alt="Contact Us" style="width: 100%;">
    <div class="contactus-text">
        <br><br>
        <h1>Contact us</h1>
        <br><br>
        <p>Expect a premium level of service from your first point of contact to your last moments 
        in Sri Lanka.<br><br>Lanka Travel plan is a Sri Lanka luxury tour service provider with a 
        particular emphasis on  tailored solutions with highly personalized <br><br> service that match the 
        luxury lifestyle and the higher expectations of the privileged clients. <br><br>Feel free to
         call, send us an email or simply complete the enquiry form to arrange your own private tailor
          made luxury tour in Sri Lanka.</p>
        <br><br>
    </div>
    <div class="contactus-ourdetails">
        <div class="ourdetails"><i class="fa fa-phone" aria-hidden="true"></i><br> <h3>Phone</h3>
            <br> <h4>0712345678</h4>
        </div>
        <hr>
        <div class="ourdetails"><i class="fa fa-home" aria-hidden="true"></i><br><h3>Address</h3>
            <br> <h4>10,Park lane,Colombo 3</h4>
        </div>
        <hr>
        <div class="ourdetails"><i class="fa fa-envelope-o" aria-hidden="true"></i><br><h3>Email</h3>
            <br> <h4>silva@gmail.com</h4>
        </div>
    </div>

    <div class="contact">
                        <h4>Find us on social media</h4>
                        <p>
                            <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                            <i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i>
                            <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
                        </p>
    </div>

    <div class="contactus-sendmsg">
        <h1>Write a line for us...</h1>
        <input class="contactus-textinput" type="text" name="name" id="" placeholder="Name">
        <input class="contactus-textinput" type="email" name="message" id="" placeholder="Email">
        <input class="contactus-textinput-msg" type="text" name="message" id="" placeholder="Message">
        <br>
        <button>Send Message</button>
    </div>

    <?php require_once("./inc/footer.php");?>