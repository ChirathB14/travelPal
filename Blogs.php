<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs | TravelPal</title>

    <!-- CSS Import -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/Blogs.css">

</head>
<body>

    <!-- Nav bar -->
    <?php
    require_once("./inc/header.php");
    ?>

    <!-- Blogs page content -->
    <div class="page-content">
        <div class="Blogs-Title">
            <div class="Blogs-TitleContent">
                <h2>Welcome to the Travel Pal Blog!</h2>
                <h4>Nature | beauty | experience</h4>
            </div>
            <button onclick="location.href = 'CreateBlogs.php';">Create Blog</button>
        </div>

        <div class="Blog-content">
            <h2>Things to do on a staycation</h2>
            <h6>03rd June, 2022 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Willium Marks</h6>
            <br>
            <img src="./assets/blog1.png" alt="Blog image">
            <br><br>
            <p>
                Think a vacation means having to fly far, far away? Our staycation ideas prove you 
                can have fun even if you can’t or <br> simply don’t want to fly halfway across the world.
                <br><br>
                Most of these activities may be readily available in your neck of the woods. A short 
                bike or car ride away from home. <br>
                And at a time when the health of our families remains a top priority, they can be done 
                while observing safe social <br> distancing.
                <br><br>
                Here are just a few creative ideas to get you started:
                <br><br>
            </p>
            <a href="">View more</a>
        </div>

        <div class="Blog-content">
            <h2>Things to do on a staycation</h2>
            <h6>03rd June, 2022 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Willium Marks</h6>
            <br>
            <img src="./assets/blog2.png" alt="">
            <br><br>
            <p>
                Think a vacation means having to fly far, far away? Our staycation ideas prove you 
                can have fun even if you can’t or <br> simply don’t want to fly halfway across the world.
                <br><br>
                Most of these activities may be readily available in your neck of the woods. A short 
                bike or car ride away from home. <br>
                And at a time when the health of our families remains a top priority, they can be done 
                while observing safe social <br> distancing.
                <br><br>
                Here are just a few creative ideas to get you started:
                <br><br>
            </p>
            <a href="">View more</a>
        </div>
        <br>
    </div>

    <!-- footer -->
    <div class="footer-lrg">
        <hr>
        <div class="foot-content">
            <div class="foot-content-left">
                <img src="./assets/logo tpal.png" alt="">
                <h3>GET INSPIRED ! RECEIVE TRAVEL DISCOUNTS, TIPS & 
                    BEHIND THE SCENE STORIES</h3>
                    <div class="subscribe">
                        <input type="text" placeholder="Your Email Address">
                        <button>Subscribe</button>
                    </div>
                    <div class="contact">
                        <h4>contact</h4>
                        <p>
                            <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                            <i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i>
                            <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
                        </p>
                    </div>
                    <div class="links-footer">
                        <div class="link">
                            <a href="">Home</a>
                            <a href="">About Us</a>
                            <a href="">Contact Us</a>
                            <a href="">Blogs</a>
                        </div>
                        <div class="link">
                            <a href="">Tour Plans</a>
                            <a href="">Preplanned Tour</a>
                            <a href="">Customize Tour</a>
                        </div>
                        <div class="link">
                            <a href="">Blogs</a>
                            <a href="">Create Blogs</a>
                        </div>
                    </div>
            </div>
            <div class="foot-content-right">
                <img src="./assets/logo.png" alt="">
            </div>
        </div>

</body>
</html>

<?php require_once("./inc/footer.php");?>