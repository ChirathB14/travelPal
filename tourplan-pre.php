<?php
$title = "Pre-made tour plans";
require_once("./inc/header.php");
require_once('./inc/connection.php');

$result= 'SELECT * FROM premadetourplan;';
$data= mysqli_query($connection,$result);
?>
    <h1>preplanned tours</h1>
    <h3><center>We have customized tours according to climate changes in Sri Lanka for more experience</center> </h3>

    <div class="pre">
        <h1>November-march</h1>
        <div class="pre-plan">
        <?php foreach ($data as $name) { ?>
            <div class="pre-plan">
                <?php if ($name['season']=='NOVEMBER-MARCH'){ ?>
                    <div class="plan-content">
                            <h5>Type <?php echo $name['type']  ?></h5>
                            <h5>Budget <?php echo $name['budget']  ?></h5>
                            <div class="cont">
                                <h3><?php echo $name['location']  ?></h3>
                                <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                                <i class="fa fa-heart" aria-hidden="true"></i>
                            </div>
                    </div>
                <?php }?>
            </div>
            <?php } ?> 
        </div>        
    </div>


    <div class="pre">
        <h1>April-June</h1>
        <div class="pre-plan">
        <?php foreach ($data as $name) { ?>
            <div class="pre-plan">
                <?php if ($name['season']=='APRIL-JUNE'){ ?>
                    <div class="plan-content">
                            <h5>Type <?php echo $name['type']  ?></h5>
                            <h5>Budget <?php echo $name['budget']  ?></h5>
                            <div class="cont">
                                <h3><?php echo $name['location']  ?></h3>
                                <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                                <i class="fa fa-heart" aria-hidden="true"></i>
                            </div>
                    </div>
                <?php }?>
            </div>
            <?php } ?> 
        </div>        
    </div>
     

    <div class="pre">
        <h1>July-October</h1>
        <div class="pre-plan">
        <?php foreach ($data as $name) { ?>
            <div class="pre-plan">
                <?php if ($name['season']=='JULY-OCTOMBER'){ ?>
                    <div class="plan-content">
                            <h5>Type <?php echo $name['type']  ?></h5>
                            <h5>Budget <?php echo $name['budget']  ?></h5>
                            <div class="cont">
                                <h3><?php echo $name['location']  ?></h3>
                                <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                                <i class="fa fa-heart" aria-hidden="true"></i>
                            </div>
                    </div>
                <?php }?>
            </div>
            <?php } ?> 
        </div>        
    </div>

    

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
        <?php require_once("./inc/footer.php");?>
    </div>