<?php
require '../DbConfig.php';
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $messege = $_POST["messege"];
    $createdDate = date('Y-m-d H:i:s');
    $contact_id = 0;

    $stmt = $conn->prepare("INSERT INTO contact (contact_id, name, messege, email, created_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('issssssi', $contact_id, $name, $messege, $email, $createdDate);
    $stmt->execute();
    echo

    "
<script>
alert('Successfully Added');
document.location.reload();
</script>
";
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/preplanned.css">
    <link rel="stylesheet" href="../../css/newFooter.css">
    <link rel="stylesheet" href="../../css/header.css">
    <!-- <script src="https://kit.fontawesome.com/c82cd88752.js" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="../../js/checkAccess.js"></script>
    <style>
        .contact-dev {
            width: 80%;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 2px 4px 4px #FFFFFF;
            padding: 25px;
        }

        .contact-main-dev {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: -40px;
        }

        .contact-p {
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 800;
            font-size: 20px;
            line-height: 114.5%;

            /* or 41px */
            text-align: center;
            letter-spacing: 0.1em;

            color: #0E064D;
        }

        .contact-h2 {
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 800;
            font-size: 25px;
            line-height: 114.5%;

            /* or 41px */
            text-align: center;
            letter-spacing: 0.1em;
            text-transform: uppercase;

            color: #0E064D;
        }

        .form-wrapper {
            width: 40%;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 2px 4px 4px #FFFFFF;
            padding: 25px;
            flex-direction: column;
            margin-top: 70px;
        }

        .form-main-wrapper {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact-input {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid #FFFFFF;
            border-radius: 15px;
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 800;
            font-size: 16px;
            line-height: 24px;

            /* identical to box height */
            letter-spacing: 0.1em;
            padding-inline-start: 10px;
            text-transform: uppercase;

            color: #0E064D;
            width: 100%;
            margin-top: 15px;


        }

        .messege-btn {
            background: #EEB444;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 800;
            font-size: 24px;
            line-height: 36px;
            text-align: center;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-top: 16px;
            padding: 10px;

            color: #FFFFFF;
        }
    </style>
    <title>Travel Pal</title>
</head>

<body style="background-color: #0E064D;" onload="checkAccess(true)">
    <table>
        <tr VALIGN=TOP>
            <ul class="header-ul">
                <li class="header-left-li"><img class="headerbtm" src="../../images/logo.png" alt="logo" width="150" height="50"></li>
                <li class="header-left-li"><a class="header-left-li a" href="../../index.php">Home</a></li>
                <li class="header-left-li"><a class="header-left-li a" href="../TourPlanningComponent/TourPlanningIndex.php">Tour Plan</a></li>
                <li class="header-left-li"><a class="header-left-li a" href="../Blog/ContactUS.php">Contact Us</a></li>
                <li class="header-left-li"><a class="header-left-li a" href="../Blog/ViewBlogs.php">Blogs</a></li>
                <li class="header-left-li"><a class="header-left-li a" id="profile" href="../../php/ProfileComponent/Profile.php">Profile</a></li>
                <li class="header-right-li"><a class="header-left-li a" id="login" href="../../php/Login.php"><button class="button-login" href="../Blog/ViewBlogs.php"><img src="../../images/User-Icon.png" alt="logo" width="20" height="20" style="margin-right: 10px;">Login</button></a></li>
                <li class="header-right-li"><a class="header-left-li a" id="register" href="../../php/RegisterUser.php"><button class="button-register" href="../Blog/ViewBlogs.php"><img src="../../images/User-Icon.png" alt="logo" width="20" height="20" style="margin-right: 10px;">Register</button></a></li>
                <li class="header-right-li"><a class="header-left-li a" id="logout" onclick="logOut()"><button class="button-login" href="../Blog/ViewBlogs.php"><img src="../../images/User-Icon.png" alt="logo" width="20" height="20" style="margin-right: 10px;">Logout</button></a></li>
            </ul>
            <hr style="background-color: #327972;color:#327972" />
        </tr>
        <tr VALIGN=TOP>
            <img src="../../images/contact.png" alt="Image" width="100%" height="auto">
            <div class="contact-main-dev">
                <div class="contact-dev">
                    <h2 class="contact-h2">Contact us</h2>
                    <p class="contact-p">
                        Expect a premium level of service from your first point of contact to your last moments in Sri Lanka.

                        Lanka Travel plan is a Sri Lanka luxury tour service provider with a particular emphasis on tailored solutions with highly personalized service that match the luxury lifestyle and the higher expectations of the privileged clients.

                        Feel free to call, send us an email or simply complete the enquiry form to arrange your own private tailor made luxury tour in Sri Lanka.
                    </p>
                </div>
            </div>
            <div class="form-main-wrapper">
                <div class="form-wrapper">
                    <form method="POST" action="ContactUS.php">
                        <input class="contact-input" name="name" type="text" placeholder="Name" required /><br>
                        <input class="contact-input" type="email" name="email" placeholder="Email" required /><br>

                        <textarea cols="30" rows="10" name="messege" class="contact-input" placeholder="Message" required></textarea><br>
                        <button type="submit" name="submit" class="messege-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </tr>
    </table>

</body>
<footer class="custom-footer">
    <div class="footer-left">
        <img src="../../images/logo.png" alt="Company logo" class="footer-logo">
        <div class="footer-title">
            <h3 class="footer-heading">Get inspired ! Recieve travel discounts, tips & behind the scene stories</h3>
        </div>
        <form class="footer-form">
            <input type="text" class="footer-input" placeholder="Enter your email address">
            <button type="submit" class="footer-button">Subscribe</button>
        </form>
        <table style="width: 100%;margin-top:20px">
            <tr>
                <td class="footer-td-text">HOME</td>
                <td class="footer-td-text">ABOUT US</td>
                <td class="footer-td-text">CONTACT US</td>
            </tr>
            <tr>
                <td class="footer-td-text">BLOGs</td>
                <td class="footer-td-text">Tour plans</td>
                <td class="footer-td-text">Preplanned Tour</td>
            </tr>
            <tr>
                <td class="footer-td-text">Customize Tour</td>
                <td class="footer-td-text">BLOGs</td>
                <td class="footer-td-text">Create Blogs</td>
            </tr>
        </table>

    </div>
    <div class="footer-right">
        <img src="../../images/footerimg.png" alt="Image description" class="footer-image">
    </div>
</footer>

</html>