<!-- Nav bar -->
<?php

require_once('./inc/connection.php');
require_once('./inc/functions.php');

//checking if the user is logged in
// if (!$_SESSION['user_id']) {
//     header('Location: login.php');
// }

// $user_id = $_SESSION['user_id'];

$subject = '';
$content = '';

if (isset($_POST['submit'])) {
    $subject = mysqli_real_escape_string($connection, trim($_POST['subject']));
    $content = mysqli_real_escape_string($connection, trim($_POST['content']));
    $userID = mysqli_real_escape_string($connection, trim($_POST['userID']));

    $errors = array();

    //checking required fields
    if (empty($subject) || empty($content)) {
        array_push($errors, "All the fields are required");
    }

    //checking maxlength
    $max_len_fields = array('content' => 500, 'subject' => 30);

    //checking max length fields
    $errors = array_merge($errors, check_max_length($max_len_fields));

    if (empty($errors)) {
        $writtenDate = strval(date("Y-m-d", time()));

        $query = "INSERT INTO blog (
                   `subject`, `content`, `writtenDate`, `userID`
                   ) VALUES (
                   '{$subject}', '{$content}', '{$writtenDate}', {$userID}
                   ) ";

        $result = mysqli_query($connection, $query);

        if ($result) {
            $last_id = mysqli_insert_id($connection);

            header("Location: blog.php?blogID={$last_id}");

            $subject = "";
            $content = "";
        } else {
            header('Location: CreateBLogs.php?failed=yes');
        }
    }
}

?>

<html>

<head>
    <!-- CSS Import -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/CreateBlogs.css">
</head>


<!-- Navigation Bar -->
<?php
$title = "Create Blog - TravePal";
require_once("./inc/header.php");
?>


<!-- Create Blogs page content -->
<div class="page-content">
    <div class="create-blog">
        <h2>Create your own Blog here</h2>
        <h5>travel pal provides you the opportunity to share your travel experiences
            with the people all around the world.</h5>
        <br>
        <?php
        if (!empty($errors)) {
            display_errors($errors);
        }
        ?>
        <?php
        if (isset($_GET['failed'])) {
            echo "<p class='error'> Failed to publish the blog. Error: " . mysqli_error($connection) . "</p>";
        }
        ?>
        <div class="create-blog-form">
            <h3>Start Blogging!</h3>
            <form action="CreateBlogs.php" method="POST">
                <div class="form-elements">
                    <!-- <input type="hidden" name="userID" value="<?php echo $user_id; ?>"> -->
                    <input type="hidden" name="userID" value="2">
                    <input type="text" name="subject" placeholder="Article Heading" <?php echo 'value="' . $subject . '"'; ?>>
                    <textarea name="content" cols="30" rows="10" placeholder="Article Body"> <?php echo $content ; ?></textarea>
                    <input type="file" placeholder="Add Photos" name="blog_image">
                    <button type="submit" name="submit">Publish</button>
                </div>
            </form>
        </div>
        <h5>Nature | beauty | experience</h5>
    </div>
</div>
<!-- Footer -->

<?php require_once("./inc/footer.php");?>


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
