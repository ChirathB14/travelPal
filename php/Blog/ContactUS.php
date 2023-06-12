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

    </style>
</head>

<?php
$title = "Contact us";
require_once("../Common/header.php");
?>

<body onload="checkAccess(true)">
    <table>
        <tr VALIGN=TOP>
            <img src="../../images/contact.jpg" alt="Image" width="100%" height="50%">
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

<!-- footer -->
<?php require_once("../Common/footer.php"); ?>

</html>