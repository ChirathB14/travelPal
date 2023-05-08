<?php
require '../DbConfig.php';

if (!isset($_COOKIE['user'])) {
    echo
    "
    <script>
      alert('To create blogs, please login first!');
      document.location.replace('../Login.php');
    </script>
    ";
}

if (isset($_POST["submit"]) && isset($_COOKIE['user'])) {
    $userID = json_decode($_COOKIE['user'])->user_Id;
    $userName = json_decode($_COOKIE['user'])->first_name;
    $head = $_POST["head"];
    $body = $_POST["body"];
    $createdDate = date('Y-m-d H:i:s');
    $isActive = 1;
    $blog_Id = 0;
    if ($_FILES["image"]["error"] == 4) {
        echo
        "<script> alert('Image Does Not Exist'); </script>";
    } else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo
            "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
        } else if ($fileSize > 5000000) {
            echo
            "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, '../../upload/BlogImg/' . $newImageName);
            // $query = "INSERT INTO blog (blog_Id, name, heading, body, image, created_by, created_date, isActivie) 
            // VALUES(0, '$userName', '$head', '$body','$newImageName', '$userID', '$createdDate', '1' )";

            $stmt = $conn->prepare("INSERT INTO blog (blog_Id, name, heading, body, image, created_by, created_date, isActivie) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('issssssi', $blog_Id, $userName, $head, $body, $newImageName, $userID, $createdDate, $isActive);
            $stmt->execute();
            echo

            "
      <script>
        alert('Successfully Added');
        document.location.replace('./ViewBlogs.php');
      </script>
      ";
            $conn->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/blog.css">
    <link rel="stylesheet" href="../../css/newFooter.css">
</head>

<!--header-->
<?php
$title = "Create Blog - TravePal";
include '../Common/header.php';
?>

<!--body-->

<body class="block-background">
    <div>
        <center>
            <div class="blog-heading">
                <h1>CREATE YOUR OWN BLOG HERE</h1>
                <h3>TRAVEL PAL PROVIDES YOU THE OPPORTUNITY TO SHARE YOUR TRAVEL EXPERIENCES WITH THE PEOPLE ALL AROUND THE WORLD.</h3>
            </div>
        </center>

        <div class="create-blog-form">
            <center>
                <h3>Start Blogging!</h3>
            </center>
            <form action="CreateBlog.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <div class="form-elements">
                    <input type="text" id="article-heading" name="head" placeholder="Article Heading" required>
                    <textarea id="article-body" name="body" cols="30" rows="10" placeholder="Article Body" required></textarea>
                    <input type="file" placeholder="Add Photos" id="blog-image" name="image" id="image" accept=".jpg, .jpeg, .png" required>
                    <br><p><strong>Note:</strong> Only .jpg, .jpeg, .png formats allowed to a max size of 5 MB.</p><br>
                    <button type="submit" name="submit" id="btn-publish">Publish</button>
                </div>
            </form>
        </div>
        <h5 style="text-align: center;">Nature | beauty | experience</h5>
    </div>
</body>


<!--
        <div class="blog-form">
            <div class="blog-form-heading">
                <h2>START BLOGGING!</h2>
            </div>

            <div class="blog-form-body">
                <form method="POST" action="CreateBlog.php" autocomplete="off" enctype="multipart/form-data">
                    <input type="text" class="article-heading" id="article-heading" name="head" placeholder="ARTICLE HEADING" required/><br />
                    <textarea cols="30" rows="10" class="article-body" id="article-body" name="body" placeholder="ARTICLE BODY" required></textarea><br />
                    <input type="file" class="blogs-image" id="blog-image" name="image" id="image" accept=".jpg, .jpeg, .png" required /><br />
                    <button id="btn-publish" class="btn-publish" name="submit">PUBLISH</button>
                </form>
                <div class="nature-beauty-experience">
                    <h3>Nature | Beauty | Experience</h3>
                </div>
            </div>


        <footer class="custom-footer" style="background-color: #0E064D;">
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
    </div>
-->

<!-- footer -->
<?php require_once("../Common/footer.php"); ?>

</html>