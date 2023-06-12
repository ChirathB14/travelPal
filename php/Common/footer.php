<?php
    $year = date("Y");
    if($title == "Contact us" || $title == "Tour plan | TravePal" || $title == "Home - TravePal" || $title == "Blogs | TravePal" 
    || $title == "Create Blog - TravePal" || $title == "PrePlanned Tour | TravePal" || $title == "Blogs_View more | TravePal" || $title == "Pre-made tour plans -TravelPal"
    || $title == "Add Service Details" || $title == "Add Services" || $title == "Update Password" || $title == "Customize Tour | TravelPal" 
    || $title == "Profile" || $title == "Service Details" || $title == "Update Profile" || $title == "Add Service Details"|| $title == "Add Services" 
    || $title == "Service Details" || $title == "View Tours"|| $title =="View My Tours - TravePal" || $title = "Payment | TravelPal" ||$title = "Payment Successfull" || $title == "Register Manager - TravePal" )
    
    {
    echo
    " 
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
            ". $year. " © TRAVEL PAL - ALL RIGHTS RESERVED
        </div>
    </div>
    </body>
    </html> ";
    }else {
    echo "
        <footer>
        <hr>
        <div class=\"footer-bottom\">
            " . $year . " © TRAVEL PAL - ALL RIGHTS RESERVED
        </div>
        </footer>
    </body>
    </html> " ;

    }
?>