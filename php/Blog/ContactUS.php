<?php
require '../DbConfig.php';
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $messege = $_POST["messege"];
    $createdDate = date('Y-m-d H:i:s');
    $contact_id = 0;

    $stmt = $conn->prepare("INSERT INTO contact (contact_id, name, messege, email, created_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('issss', $contact_id, $name, $messege, $email, $createdDate);
    $stmt->execute();
    echo
    "
    <script>
    alert('Successfully Added');
    document.location.replace('./ContactUS.php');
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

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/preplanned.css">
    <link rel="stylesheet" href="../../css/newFooter.css">
    <link rel="stylesheet" href="../../css/header.css">
    <!-- <script src="https://kit.fontawesome.com/c82cd88752.js" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="../../js/checkAccess.js"></script>
    <style>
        .contact-dev {
            width: 80%;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 2px 4px 4px var(--accentcolor);
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
            font-weight: 800;
            font-size: 16px;
            line-height: 110%;
            text-align: center;
            letter-spacing: 0.1em;
            color: var(--primarycolor);
        }

        .contact-h2 {
            font-weight: 800;
            font-size: 25px;
            line-height: 110%;
            margin-bottom: 10px;
            text-align: center;
            letter-spacing: 0.1em;
            color: var(--primarycolor);
        }

        .form-wrapper {
            width: 36%;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 2px 4px 4px var(--accentcolor);
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

        .input-elements textarea {
            border: 1px solid var(--accentcolor);
            border-radius: 5px;
            font-weight: 800;

            /* identical to box height */
            letter-spacing: 0.1em;
            padding-inline-start: 10px;
            color: var(--primarycolor);
            margin-top: 12px;
            text-transform: uppercase;
            font-size: 12px;
        }

        /*
        .messege-btn {
            background: var(--secondarycolor);
            border-radius: 10px;
            font-weight: 800;
            font-size: 24px;
            line-height: 36px;
            text-align: center;
            letter-spacing: 0.1em;
            margin-top: 16px;
            padding: 10px;
            color: var(--accentcolor);
        }
        */
    </style>
</head>

<?php
$title = "Contact us";
require_once("../Common/header.php");
?>

<body onload="checkAccess(true)">
    <table>
        <!--
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
    -->
        <tr VALIGN=TOP>
            <img src="../../images/contact.png" alt="Image" width="100%" height="auto">
            <div class="contact-main-dev">
                <div class="contact-dev">
                    <h2 class="contact-h2">Contact us</h2>
                    <p class="contact-p">
                        Expect a premium level of service from your first point of contact to your last moments in Sri Lanka.
                        Lanka Travel plan is a Sri Lanka luxury tour service provider with a particular emphasis on tailored
                        solutions with highly personalized service that match the luxury lifestyle and the higher expectations of the privileged clients.
                        Feel free to call, send us an email or simply complete the enquiry form to arrange your own private
                        tailor made luxury tour in Sri Lanka.
                    </p>
                </div>
            </div>
            <div class="form-main-wrapper">
                <div class="form-wrapper">
                    <form method="POST" action="ContactUS.php">
                        <div class="input-elements" style="margin-left: auto; margin-right: auto;">
                            <input name="name" type="text" placeholder=" Name" required />
                            <input type="email" name="email" placeholder="Email" required pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" />
                            <textarea cols="30" rows="10" name="messege" placeholder="Enter your message..." required></textarea><br>
                            <button type="submit" name="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </tr>
    </table>
    <br><br>

</body>

<!--
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
    -->

<!-- footer -->
<?php require_once("../Common/footer.php"); ?>

</html>