<?php
require_once('./inc/connection.php');
require_once('./inc/functions.php');

session_start();
//checking if the user is logged in
if (!$_SESSION['user_id']) {
    header('Location: tourist/t-login.php');
}

$subject = '';
$content = '';
// $blogImage = '';

if (isset($_POST['submit'])) {
    $subject = mysqli_real_escape_string($connection, trim($_POST['subject']));
    $content = mysqli_real_escape_string($connection, trim($_POST['content']));
    $userID = mysqli_real_escape_string($connection, trim($_POST['userID']));
    // $blogImage = mysqli_real_escape_string($connection, trim($_FILES["blogImage"]));

    $errors = array();

    //checking required fields
    if (empty($subject) || empty($content)) {
        array_push($errors, "All the fields are required");
    }

    //checking maxlength
    $max_len_fields = array('content' => 1000, 'subject' => 30);

    //checking max length fields
    $errors = array_merge($errors, check_max_length($max_len_fields));

    //getting author name using userID
    $query = "SELECT * FROM users WHERE userID = '{$userID}'";

    $blog_author = mysqli_query($connection, $query);

    verify_query($blog_author);

    while ($author = mysqli_fetch_assoc($blog_author)) {
        $authorName = $author['firstName'] . " " . $author['lastName'];
    }

    $filename = "";
    $filetype = "";
    $filesize = "";

    // Check if file was uploaded without errors
    if (isset($_FILES["blogImage"]) && $_FILES["blogImage"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
        $filename = mysqli_real_escape_string($connection, trim($_FILES["blogImage"]["name"]));
        $filetype = mysqli_real_escape_string($connection, trim($_FILES["blogImage"]["type"]));
        $filesize = mysqli_real_escape_string($connection, trim($_FILES["blogImage"]["size"]));

        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) {
            die("Error: Please select a valid file format.");
        }

        // Validate file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
        if ($filesize > $maxsize) {
            die("Error: File size is larger than the allowed limit.");
        }

        // Validate type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("./uploads/blogs/" . $filename)) {
                array_push($errors, $filename . " is already exists.");
            } else {
                if (move_uploaded_file($_FILES["blogImage"]["tmp_name"], "./uploads/blogs/" . $filename)) {
                    //file uploading
                } else {
                    array_push($errors, "File is not uploaded");
                }
            }
        } else {
            array_push($errors, "Error: There was a problem uploading your file. Please try again.");
        }
    } else {
        array_push($errors, "Please select an Image for blog");
    }

    if (empty($errors)) {

        $writtenDate = strval(date("Y-m-d", time()));

        $query = "INSERT INTO blog (
                   `subject`, `content`, `writtenDate`, `authorName`, `imagePath`, `type`, `size`
                   ) VALUES (
                   '{$subject}', '{$content}', '{$writtenDate}', '{$authorName}', '{$filename}', '{$filetype}', '{$filesize}'
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
    <link rel="stylesheet" href="./css/main.css">
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
            <form action="CreateBlogs.php" method="POST" enctype="multipart/form-data">
                <div class="form-elements">
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']; ?>">
                    <input type="text" name="subject" placeholder="Article Heading" <?php echo 'value="' . $subject . '"'; ?>>
                    <textarea name="content" cols="30" rows="10" placeholder="Article Body"> <?php echo $content; ?></textarea>
                    <input type="file" placeholder="Add Photos" name="blogImage" id="blogImage">
                    <p><strong>Note:</strong> Only .jpg, .jpeg, .png formats allowed to a max size of 5 MB.</p>
                    <button type="submit" name="submit">Publish</button>
                </div>
            </form>
        </div>
        <h5>Nature | beauty | experience</h5>
    </div>
</div>

<!-- Footer -->


</html>

<?php require_once("./inc/footer.php"); ?>
<?php mysqli_close($connection); ?>