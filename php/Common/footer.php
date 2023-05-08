<!--
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Footer Design</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/footer.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        /* Footer */
        .footer {
            background-color: #4A4A4A;
            color: #fff;
            font-size: 14px;
            font-weight: 300;
            line-height: 1.5;
            padding: 50px 0;
        }

        /* Container */
        .container-footer {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* Column */
        .footer-col {
            width: 23%;
            margin-bottom: 30px;
        }

        /* Column Title */
        .footer-col h4 {
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        /* Column Links */
        .footer-col ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .footer-col ul li {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 300;
            display: block;
        }

        /* Newsletter Form */
        .newsletter-content {
            display: flex;
        }

        .newsletter-input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px 0 0 5px;
            font-size: 14px;
            font-weight: 300;
            color: #4A4A4A;
        }

        .btn-sub {
            background-color: #fff;
            border: none;
            border-radius: 0 5px 5px 0;
            margin: 0;
            padding: 0;
        }

        .newsletter-btn {
            background-color: #ffda0a;
            color: #4A4A4A;
            font-size: 14px;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }

        /* Social Links */
        .social-links a {
            display: inline-block;
            background-color: #fff;
            color: #4A4A4A;
            width: 35px;
            height: 35px;
            text-align: center;
            line-height: 35px;
            margin-right: 10px;
            border-radius: 50%;
            transition: all 0.3s;
        }

        .social-links a:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        /* Footer Image */
        .footer-img {
            max-width: 100%;
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            .footer-col {
                width: 48%;
            }
        }
    </style>
</head>

<body>
    <footer class="footer">
        <div class="container-footer">
            <div class="row">
                <div class="col-md-3 footer-col">
                    <h4>company</h4>
                    <ul>
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">ABOUT US</a></li>
                        <li><a href="#">CONTACT US</a></li>
                        <li><a href="#">BLOGS</a></li>
                        <li><a href="#">CREATE BLOGS</a></li>
                        <li><a href="#">PREPLANNED TOUR</a></li>
                        <li><a href="#">TOUR PLANS</a></li>
                        <li><a href="#">CUSTOMIZED TOUR</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-col">
                    <h4>NEWSLETTER</h4>
                    <form>
                        <div class="newsletter-content">
                            <input class="newsletter-input" type="email" placeholder="Your Email Address" required>
                            <div class="btn-sub">
                                <button class="newsletter-btn" type="submit">SUBSCRIBE</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-3 footer-col">
                     <h4>connect with us</h4> 
                    <div class="s">
                        <img class="footer-img" src="../../images/footerimg.png" alt="Footer Image">
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
    -->

<?php
    if($title == "Contact us" || $title == "Tour plan | TravePal" || $title == "Home - TravePal" || $title == "Blogs | TravePal" 
    || $title == "Create Blog - TravePal" || $title == "PrePlanned Tour | TravePal" || $title == "Blogs_View more | TravePal" || $title == "Pre-made tour plans -TravelPal"
    || $title == "Add Service Details" || $title == "Add Services" || $title == "Update Password" || $title == "Customize Tour | TravelPal" 
    || $title == "Profile" || $title == "Service Details" || $title == "Update Profile" || $title == "Add Service Details"|| $title == "Add Services" 
    || $title == "Service Details" || $title == "View Tours"|| $title =="View My Tours - TravePal" || $title = "Payment | TravelPal")
    
    {
    echo" 
    <hr>
    <div class=\"footer\">
            <div class=\"foot-left\">
                <img src=\"/travelPal/images/logo.png\" alt=\"logo\">
                <h3>GET INSPIRED ! RECEIVE TRAVEL DISCOUNTS, TIPS & 
                    BEHIND THE SCENE STORIES</h3>
                    <div class=\"subscribe\">
                        <input type=\"email\" placeholder=\"Your Email Address\" required>
                        <button type=\"submit\">Subscribe</button>
                    </div>
                    <div class=\"contact\">
                        <h4>contact</h4>
                        <p>
                        &nbsp;<i class=\"fa fa-instagram fa-2x\" aria-hidden=\"true\"></i>&nbsp;
                        &nbsp;<i class=\"fa fa-youtube-play fa-2x\" aria-hidden=\"true\"></i>&nbsp;
                        &nbsp;<i class=\"fa fa-facebook-square fa-2x\" aria-hidden=\"true\"></i>&nbsp;
                        </p>
                    </div>
                    <div class=\"links-footer\">
                        <div class=\"link\">
                            <a href=\"/travelPal/index.php\">Home</a>
                            <a href=\"/travelPal/php/Blog/ContactUS.php\">About Us</a>
                            <a href=\"/travelPal/php/Blog/ContactUS.php\">Contact Us</a>
                        </div>
                        <div class=\"link\">
                            <a href=\"/travelPal/php/TourPlanningComponent/TourPlanningIndex.php\">Tour Plans</a>
                            <a href=\"/travelPal/php/TourPlanningComponent/TourPlanningIndex.php\">Preplanned Tour</a>
                            <a href=\"/travelPal/php/TourPlanningComponent/TourPlanningIndex.php\">Customize Tour</a>
                        </div>
                        <div class=\"link\">
                            <a href=\"/travelPal/php/Blog/ViewBlogs.php\">Blogs</a>
                            <a href=\"/travelPal/php/Blog/ViewBlogs.php\">Create Blogs</a>
                        </div>
                    </div>
            </div>
            <div class=\"foot-right\">
                <img src=\"/travelPal/images/footerimg.png\" alt=\"\">
            </div>
        </div>
        <?php require_once(\"./inc/footer.php\");?>
        <hr>
        <div class=\"footer-bottom\">
                © <?php echo date(\"Y\"); ?> TRAVEL PAL ALL RIGHTS RESERVED
        </div>
    </div>
    </body>
    </html> ";
    }else {
    echo "
        <footer>
        <hr>
        <div class=\"footer-bottom\">
                © <?php echo date(\"Y\"); ?> TRAVEL PAL ALL RIGHTS RESERVED
        </div>
        </footer>
    </body>
    </html> " ;

    }
?>