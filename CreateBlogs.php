    <!-- Nav bar -->
    <?php
    require_once("./inc/header.php");
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blogs | TravelPal</title>

    <!-- CSS Import -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/CreateBlogs.css">

    <!-- Icon import -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet"/>

</head>
<body>
    <!-- Navigation Bar -->


    <!-- Create Blogs page content -->
    <div class="page-content">
       <div class="create-blog">
            <h2>Create your own Blog here</h2>
            <h5>travel pal provides you the opportunity to share your travel experiences 
            with the people all around the world.</h5>
            <br>
            <div class="create-blog-form">
                <h3>Start Blogging!</h3>
                <form action="">
                    <div class="form-elements">
                        <input type="text" placeholder="  Your name">
                        <input type="text" placeholder="  Article Heading">
                        <textarea name="body" cols="30" rows="10" placeholder="Article Body"></textarea>
                        <input type="file" placeholder="   Add Photos" name="Choose file">
                        <button>Publish</button>
                    </div>
                </form>
            </div>
            <h5>Nature | beauty | experience</h5>
       </div>
    </div>

    <!-- Footer -->
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