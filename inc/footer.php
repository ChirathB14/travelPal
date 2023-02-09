<?php
    if($title == "Contact us" || $title == "Tour plan | TravePal" || $title == "Home - TravePal" || $title == "Blogs | TravePal" 
    || $title == "Create Blog - TravePal" || $title == "Pre-made tour plans" || $title == "Blogs_View more | TravePal" || $title == "Pre-made tour plans -TravelPal"
    || $title == "Add Service Details" || $title == "Add Services" || $title == "Update Password" 
    || $title == "Profile" || $title == "Service Details" || $title == "Update Profile" || $title == "Add Service Details"|| $title == "Add Services" 
    || $title == "Service Details" || $title == "View Tours")
    {
    echo" 
    <hr>
    <div class=\"footer\">
            <div class=\"foot-left\">
                <img src=\"/travelPal/assets/logo tpal 1.png\" alt=\"logo\">
                <h3>GET INSPIRED ! RECEIVE TRAVEL DISCOUNTS, TIPS & 
                    BEHIND THE SCENE STORIES</h3>
                    <div class=\"subscribe\">
                        <input type=\"text\" placeholder=\"Your Email Address\">
                        <button>Subscribe</button>
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
                            <a href=\"\">Home</a>
                            <a href=\"\">About Us</a>
                            <a href=\"\">Contact Us</a>
                        </div>
                        <div class=\"link\">
                            <a href=\"\">Tour Plans</a>
                            <a href=\"\">Preplanned Tour</a>
                            <a href=\"\">Customize Tour</a>
                        </div>
                        <div class=\"link\">
                            <a href=\"\">Blogs</a>
                            <a href=\"\">Create Blogs</a>
                        </div>
                    </div>
            </div>
            <div class=\"foot-right\">
                <img src=\"/travelPal/assets/logo.png\" alt=\"\">
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